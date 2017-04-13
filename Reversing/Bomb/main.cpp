#include <iostream>
#include <cstring>
#include <unistd.h>

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
	printf("   _______ ___ \n");
	printf("  | 7 | 8 | 9 |\n");
	printf("  |___|___|___|\n");
	printf("  | 4 | 5 | 6 |\n");
	printf("  |___|___|___|\n");
	printf("  | 1 | 2 | 3 |\n");
	printf("  |___|___|___|\n");
	printf("  | 0 | enter |\n");
	printf("  |___|_______|\n");
}
void bomb()
{
	printf("B");
	for (int i=0; i<60; i++) {
		printf("O");
		fflush(stdout);
		usleep(5000);
	}
	printf("M!\n");
	printf("       _.-^^---....,,--       \n");
	printf("   _--                  --_   \n");
	printf("  <                        >) \n");
	printf("  |                         | \n");
	printf("   \._                   _./  \n");
	printf("      ```--. . , ; .--'''     \n");
	printf("            | |   |           \n");
	printf("         .-=||  | |=-.        \n");
	printf("         `-=#$%&%$#=-'        \n");
	printf("            | ;  :|           \n");
	printf("   _____.,-#%&$@%#&#~,._____  \n");
	exit(0);
}
int main(int argc, char **argv)
{
	char input[10];
	banner();
	cout << "  Deactivation Code " << endl << "  > ";
	cin >> input;

	if (strlen(input) !=8) bomb();
	for (int i = 0; i < 8; i++) {
		if (input[i] > 57 || input[i] < 48) bomb();
	}

	char * password1 = input;
	std::string decode1 =  "\xf7\xfc\xb5\x83\x81\xa7\x83\x89\xbd\xfd\xbf\x9e\xfa\xa6\x9a\xf4\x84\xa2";
	for ( size_t i=0 ; i < decode1.length() ; i++ ) {
		decode1[i] ^= ~password1[i % strlen(password1)];
		}

	char * password2 = decode1.c_str();
	if (password2[1]!=53 || password2[8]!=115 || password2[11]!=86 || password2[14]!=81) bomb();

	std::string decode2 = "\xbb\xa8\xea\x84\xd7\xca\x80\x80\xee\xa9\xb9\xdb\x91\xf0\x9d\xfb\x81\xe2\xf7\xfd\xe4\x80\x86\xf1\xcc\xc5\xe5\xa9\xef\xc0\xa6\xe3\xc8";
	for ( size_t i=0 ; i < decode2.length() ; i++ ) {
		decode2[i] ^= ~password2[i % strlen(password2)];
		}

	if (decode2[28]!=98 || decode2[29]!=105 || decode2[7]!=49 || decode2[30]!=104 || decode2[31]!=119) bomb();
	std::cout << std::endl   << string(decode2.rbegin(), decode2.rend()) << std::endl;
	return 0;
}

// - 16274248
// - 95xKJjHNs4rV1kQ3Jk
// - }bm0b_71bb4r_d374v17c43d{tibbihwf
// - fwhibbit{d34c71v473d_r4bb17_b0mb}
