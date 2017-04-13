using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.InteropServices;
using System.Security;

namespace Carrot
{
    class Program
    {
        static void Main(string[] args)
        {
            //AESHelper AES = new AESHelper(Res.key, Res.iv + Res.key, 50, Res.iv, AESHelper.EKeyLength.Length256);
            //byte[] d = Encoding.ASCII.GetBytes("I see a fucking bird eating my carrot");
            //byte[] pass = AES.Encrypt(d,0,d.Length,null);

            //int ix = 0;
            //StringBuilder sb = new StringBuilder();
            //foreach (byte b in pass)
            //{
            //    sb.AppendLine("yield return 0x" + b.ToString("x2") + ";");
            //    ix++;
            //}

            //string s = sb.ToString();

            Console.ForegroundColor = ConsoleColor.Green;
            Console.Write(@"                                                                                                    
                                                    ``                                              
                                                   `/ -`                                             
                                                  :.::..
                                                 :++--/ -`                                           
                                                ./ +/:/ +-
                                              .` / -:-//:`      
                                               .///+/:+:-.`                                           
                                             ./ o / +:```-.-:-.`                                       
                                       .-... `:///``./oos+-`                                        
            ``  .`                      -+++--. ::./ osys +.
         `-..:` -/`  `                  ./ +++/ +`:`.+++-.`                                           
       `-://:-:.-/- ./-.                -:/:/-..::/-`  ```                                          
        -+o++//:-:: -+/`-:`       `      `.:+.:.. `-:`:///:-`                                       
         `-:/:-/ -.-.://-//.     ``:::``  `://:+:  -+:/++/::-`                                       
         `:/::-.::..//-///   ``-:``:+:/.-. ``-/:`.:/++///-. `  `                                    
          `.-::/:/:.:/`-/` `.:-/.  `-/ +/// `/:/-`  `-:`./:-//://:`   ``      `   `                  
           `.....--..//.-  -/::.    `/++//-`o//`  ./+:-+++oooo+//-   .-`   `.-` `-`                 
         `-://+//--::.:+:-``/-`   .-/o/.```./::``.:/://++ossso++-    -:-   -::-`::.    ``           
          `..--://+//:.:.:/ :`    .+sss/ :..-./.`-//+ssysysyo///:`  .-:-` `:----/:`  `:-`  ``   ``  
             `.--`.-.  `-:+.   `.-:+ooyy::+:--/   `/ ++oooo / +o +/ +:` `:-:-` ----///:` .::.`.::``--.`  
           `-/////-/+.  `-:`  .///++sooss/o::o+` `:o//:/+++oo+//-. :---.`./:/::/:.`:/::::/::-:-.`   
           `.--:/ +++++/:-::```:+os + syy++y++ +:s /`..o /://o/:o/.::::..::/-.////:://.-:::///+/:-..`     
              `----:/ +o -:++:-//sosoooo-`+/+yoy:./-/oo+++/+ss:--:. :::...:/:-..++/://+/o+/:-`        
               ```:+-.` ..+-:-osoo + oo / - `-oy:/ +-/ +ssoo++ +///`-/.:::::-..:/+++//+///:/o:-            
               ``.::::-..`.--/ ++++oyy +:``:ss.+ y / -oo++s /:/:. -/ +++:///+::--./ssso/:/-`.`             
             `-:/ ++/////:://:`:++/:/osso-+syshy//ss+/:-///:-`-/+:.:::+/--:-:/+yss+:.                
            ```  `-/ +/:/ ++./:  :so /:.+yyo + syhy / -sssssso / -.+:.:-``...+//oo:////++/.`          
                 .:::://::-..:+ssss:::-``oss+:hyso+syys:/yyyso//..//++:`.::-`/:oo/..:+++:.                   
        .://+/++//++++:.+/:-/+/-+:oosoyssossoys+shss/+: ./+os-.//+/:/::soo/://:`                    
         `.-::/://+o/+-.:+++/:/://syys+hhhs+oyh+shy-`.-/+:+oyooo++osso+oo/:---`                     
            ````.:+/ -:::/:-.----:/ -./ o:/ ssyhhhhyhho +./ oo /`:+oyo -/ +/ oyoooo /.`                        
                ``  ./ +/::::://``    -+oosyhhhyooos-:/.`` `/./+ `/:-syyo/:`                         
                   `.`..--::`/`     `:+oo + ssyhysosso:`        `  `/`./ +/
                    `.-:/.:.        .//++osssyysyyo/..``                                            
                    `-+/` .          .` `/ oo / +sss + -`                                                
                     .`                  `-:::/ +/:                                                  
                                         `..-:///:           ");

            Console.ForegroundColor = ConsoleColor.Red;
            Console.Write(@"
                                `.-:::::/://:/++++::::::--`                                         
                               .-::-- -::::///////++++++++++:`                                       
                              ------------:::::///+////////++-                                      
                             .-------..-- -::////////////////++.                                     
                             ------ -...-- -::////+++////////////                                     
                             ---------- -::::::/ ++++////////////`                                    
                             .------------:::://+++////////////                                     
                             .----------:::::///++/////////////                                     
                              --------------:///++///////////+-                                     
                              .-----..------ -://+++////////+++.                                     
                              `-::-------- -:://++++///////+++:                                      
                               -- -:---------://++++/////+++++                                       
                               --:-----://://++/////////++++-                                       
                               `--------::://////++////++o+:                                        
                                `-::--:::///////+++////++o+-                                        
                                `-::--::::////+++++////++++.                                        
                                 `-----::://///+++++++++++/                                         
                                  .-:----::////++++//+++++.                                         
                                   ------::://+++++//++++:                                          
                                   .----::////++++++++o+/                                           
                                    -:---:://///+++++o++:                                           
                                     :---:///+++++++++++-                                           
                                     -:--::://///+++++++`                                           
                                     `::-- -:////++++++++                                            
                                     `::-- -:/ +/ ++++++++
                                       .::-://++++++++++:                                            
                                       ----::/ +++++++++.
                                       `--:::/ +++++++++:                                            
                                        -----:/ ++++++++.
                                        -- -:://++++oo+:                                             
                                        `-::://+++++++.                                             
                                         `--://++++++/                                              
                                          --://++++++-                                              
                                          .--:/ ++++++`                                              
                                           --:/ +++++-
                                           .--//+++/                                                
                                           .--//+++.                                                
                                           `-::/ ++/
                                            .-:/ ++-
                                             .-/ +/
                                             `-//`                                                  
                                              ./ -
                                              ./`                                                   
                                              `:                                                    
                                              `-
                                              `.                                                    
                                               .`                                                   
                                               .`                                                   
                                               `                                                    
                                                                                                    
                                                         ");

            Console.ForegroundColor = ConsoleColor.Blue;
            Console.WriteLine("");
            Console.WriteLine("The magic carrot need the key: ");
            Console.ForegroundColor = ConsoleColor.White;
            string pwd = Console.ReadLine();

            if (IsPasswordOk(pwd)) Console.WriteLine("fwhibbit{" + new string(Flagize(pwd).ToArray()) + "}");
            else Console.WriteLine(":(");

            Console.WriteLine("Press any key for exit");
            Console.ReadKey();
        }
        static IEnumerable<byte> GetPassword()
        {
            yield return 0x4a;
            yield return 0xe5;
            yield return 0xa1;
            yield return 0x39;
            yield return 0xab;
            yield return 0xba;
            yield return 0x7d;
            yield return 0xfd;
            yield return 0xab;
            yield return 0x0f;
            yield return 0xcf;
            yield return 0xb3;
            yield return 0xbb;
            yield return 0xe6;
            yield return 0xf2;
            yield return 0xd9;
            yield return 0x33;
            yield return 0xd4;
            yield return 0x7e;
            yield return 0x5b;
            yield return 0xe2;
            yield return 0xd9;
            yield return 0x9c;
            yield return 0x53;
            yield return 0xaf;
            yield return 0x0f;
            yield return 0xe5;
            yield return 0x1d;
            yield return 0xe3;
            yield return 0xda;
            yield return 0x36;
            yield return 0x65;
            yield return 0x05;
            yield return 0x77;
            yield return 0x99;
            yield return 0x3b;
            yield return 0xbb;
            yield return 0xd4;
            yield return 0xf9;
            yield return 0x30;
            yield return 0xd5;
            yield return 0x2b;
            yield return 0x35;
            yield return 0xb6;
            yield return 0x80;
            yield return 0xe4;
            yield return 0x08;
            yield return 0xd6;
        }
        static char GetChar(SecureString value, int idx)
        {
            IntPtr bstr = Marshal.SecureStringToBSTR(value);
            try
            {
                // Index in 2-byte (char) chunks
                return (char)Marshal.ReadByte(bstr, idx * 2);
            }
            finally
            {
                Marshal.FreeBSTR(bstr);
            }
        }
        static bool IsPasswordOk(string pwd)
        {
            if (string.IsNullOrEmpty(pwd)) return false;

            char[] tiene = pwd.ToCharArray();

            AESHelper AES = new AESHelper(Res.key, Res.iv + Res.key, 50, Res.iv, AESHelper.EKeyLength.Length256);

            SecureString s = AES.Decrypt(GetPassword().ToArray());
            if (tiene.Length != s.Length) return false;

            int ix = 0;

            foreach (char c in tiene)
            {
                if (c != GetChar(s, ix)) return false;
                ix++;
            }

            return true;
        }
        static IEnumerable<char> Flagize(string pwd)
        {
            foreach (char c in pwd.ToCharArray())
            {
                switch (c)
                {
                    case 'a': yield return '4'; break;
                    case 'e': yield return '3'; break;
                    case 'i': yield return '1'; break;
                    case 'o': yield return '0'; break;
                    case 's': yield return '5'; break;
                    case ' ': yield return '_'; break;
                    default: yield return c; break;
                }
            }
        }
    }
}