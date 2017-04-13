#include <iostream>
#include <cstring>

using namespace std;

void banner ()
{
	printf("\n             .--``..---.           \n");
	printf("         .````--:ohdmNms/`         \n");
	printf("          -:/+++/-.:smNd+          \n");
	printf("       ```..--:ohmNNdhh.           \n");
	printf("     `-. `.``.-+sosshd.         :. \n");
	printf("   -os--/sosdmmNNMMNy         .+// \n");
	printf("  :h+.+hNNMMMNNNMMNm/      `/yNN.` \n");
	printf(" .do/oNNMMMMMmohs+:`    .+hNMMMM-` \n");
	printf(" `yohNhNNNMh-           dosNMMMmo- \n");
	printf("  -mN+hMMMy             .smNMNdd/+`\n");
	printf("   yN.hMMh               +NMMNmhds:\n");
	printf("   +N//m+                 .osshyho \n");
	printf("  ..smhh                           \n");
	printf("   ::oNmy-                         \n");
	printf("      .//yhs/:`                    \n");
	printf("          :ymNN/                   \n");
	printf("         .-+shdho.                 \n");
	printf("             `.--..`               \n");
}

void salida() {

	printf("  Wrong Serial");
	printf("  ¯\\_(ツ)_/¯\n");
	exit(0);
}

bool check(char c1, char c2, int c3) {
	if (c1*2+c3 == c2) return true;
	return false;
}
int main(int argc, char **argv)
{
	char mail[512];
	char serial[512];
	bool mailv;
	banner();
	printf( " Enter your Mail\n > ");
	cin >> mail;
	printf( " Enter Serial\n > ");
	cin >> serial;

	for (int i=0;i < strlen(mail); i++) {
		if (mail[i] == '@') mailv = true;
	}
	if (!mailv || strlen(mail) < 4)  salida();

	if (strlen(serial) < 25)  salida();
	if (serial[5]!='-' && serial[11]!='-' && serial[18]!='-')  salida();
	if (serial[0]!=serial[10])  salida();
	if (serial[1]!='z')  salida();
	if (serial[3]!='y')  salida();
	if (serial[25])  salida();
	if (serial[2]!='e')  salida();
	if (serial[4]!=serial[17]+2)  salida();
	if (serial[6]!='d')  salida();
	if (serial[7]!='r')  salida();
	if (serial[8]!=serial[22])  salida();
	if (serial[9]!='L')  salida();
	if (!check(serial[5],serial[12], 9))  salida();
	if (serial[23]!=serial[17]+1)  salida();
	if (serial[13]!='t')  salida();
	if (serial[14]!='f')  salida();
	if (!check(serial[15],serial[16], -134)) salida();
	if (serial[21]!='T')  salida();
	if (serial[16]!='H')  salida();
	if (serial[20]!='u')  salida();
	if (serial[17]!='5')  salida();
	if (serial[19]!='p')  salida();
	if (serial[22]!='F')  salida();
	if (serial[10]!=serial[21])  salida();
	if (!check(serial[24],serial[20], -61)) salida();

	std::string decode = "\xd9\xb1\xf8\xe4\xf9\xa6\xc4\xfe\x8a\xc1\x9a\xe6\xf0\xa6\xab\xd2\xf5\x82\xea\xfb\xe9\xc0\xda\x9d\xcc";
	for ( size_t i=0 ; i < decode.length() ; i++ ) {
		decode[i] ^= ~serial[i % strlen(serial)];
	}
	std::cout << std::endl << "  fwhibbit{"<< decode.c_str() << "}" << std::endl;
}

// - Tzey7-drFLT-ctfgH5-puTF6Y
// - fwhibbit{r4bb1t_s3r14l-2JBH8tckcTj}
