using System.IO;
using System.Security;
using System.Security.Cryptography;
using System.Text;

namespace Carrot
{
    public class AESHelper
    {
        RijndaelManaged symmetricKey = new RijndaelManaged() { Mode = CipherMode.CBC };
        ICryptoTransform encryptor, decryptor;

        public enum EKeyLength
        {
            Length128 = 128,
            Length192 = 192,
            Length256 = 256
        }

        /// <summary>
        /// Clase de encriptación
        /// </summary>
        /// <param name="password">Texto que se usará para generar el algoritmo de cifrado</param>
        /// <param name="valorRGBSalt">una cadena de texto cualquiera</param>
        /// <param name="iteraciones">número de iteraciones</param>
        /// <param name="vectorInicial">Un texto o número de 16 bytes (16 caracteres)</param>
        /// <param name="keyLength">Tamaño clave: puede ser 128, 192 o 256</param>
        public AESHelper(string password, string valorRGBSalt, int iteraciones, string vectorInicial, EKeyLength keyLength)
        {
            if (vectorInicial == null) vectorInicial = "";
            if (vectorInicial.Length != 16)
            {
                if (vectorInicial.Length < 16) vectorInicial = vectorInicial.PadLeft(16, '0');
                else vectorInicial = vectorInicial.Substring(0, 16);
            }

            byte[] InitialVectorBytes = Encoding.ASCII.GetBytes(vectorInicial);
            byte[] saltValueBytes = Encoding.ASCII.GetBytes(valorRGBSalt);

            PasswordDeriveBytes pd = new PasswordDeriveBytes(password, saltValueBytes, "SHA1"  // Algoritmo de cifrado: puede ser MD5 ó SHA1
                , iteraciones);
            byte[] keyBytes = pd.GetBytes((int)keyLength / 8);

            encryptor = symmetricKey.CreateEncryptor(keyBytes, InitialVectorBytes);
            decryptor = symmetricKey.CreateDecryptor(keyBytes, InitialVectorBytes);
        }
        #if DEBUG
        public byte[] Encrypt(byte[] data, int index, int length, byte[] header)
        {
            byte[] cipherTextBytes = null;
            try
            {
                using (MemoryStream ms = new MemoryStream())
                {
                    if (header != null)
                        ms.Write(header, 0, header.Length);

                    using (CryptoStream cs = new CryptoStream(ms, encryptor, CryptoStreamMode.Write))
                    {
                        cs.Write(data, index, length);
                        cs.FlushFinalBlock();
                    }

                    cipherTextBytes = ms.ToArray();
                }
            }
            catch { }
            return cipherTextBytes;
        }
#endif
        public SecureString Decrypt(byte[] data)
        {
            SecureString s = new SecureString();
            try
            {
                using (MemoryStream ms = new MemoryStream(data, 0, data.Length))
                using (CryptoStream cs = new CryptoStream(ms, decryptor, CryptoStreamMode.Read))
                {
                    int l;
                    while ((l = cs.ReadByte()) != -1)
                        s.AppendChar((char)l);
                }
            }
            catch { }
            return s;
        }
    }
}