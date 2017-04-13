#include <iostream>
#include <cstring>
#include <Windows.h>

using namespace std;

void banner()
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

int main(int argc, char **argv)
{
	banner();

	char * password1 = "\x32\x54\xF3\x75\x64\x43\x65\x88\x44\x6B\x44\xA4\x4B\x57\x41\x56\x4A\x34\x59\x54\x77";
	std::string decode1 = "\x3c\x9c\x46\xbf\xad\x92\xb8\x01\xe9\xa3\xf3\x6d\xf5\x31\xe4\x5d";
	for (size_t i = 0; i < decode1.length(); i++) {
		decode1[i] ^= ~password1[i % strlen(password1)];
	}

	char password2[256];
	strcpy(password2, decode1.c_str());
	std::string decode2 = "\x73\xbb\xde\xa9\xbc\x82\x82\xfa\xdf\xfb\xd3\xfd\x8d\x2e\xfa\x4e\x5e\x97\xdb\xf9\xa2\xe1\xaf\xeb\xd6\xbc\xde\xab\xdc\x0f\xcd\x7c\x68";
	for (size_t i = 0; i < decode2.length(); i++) {
		decode2[i] ^= ~password2[i % strlen(password2)];
	}
	printf("\n %s \n\n", string(decode2.rbegin(), decode2.rend()).c_str());
	Sleep(5000);
	return 0;
}

// - \x3c\x9c\x46\xbf\xad\x92\xb8\x01\xe9\xa3\xf3\x6d\xf5\x31\xe4\x5d
// - \x32\x54\x75\x75\x64\x43\x65\x77\x44\x6B\x44\x74\x4B\x57\x41\x56\x4A\x34\x59\x54\x77
// - \xf1\x37\x4A\x35\x36\x2E\x22\x76\x52\x37\x48\x36\x41\x99\x5A\xf4
// - }skcuS_sr3d43H_EP_n3k0rb{tibbihwf
// - fwhibbit{br0k3n_PE_H34d3rs_Sucks}
