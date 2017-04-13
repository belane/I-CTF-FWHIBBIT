#include <iostream>
#include <cstring> 

using namespace std;

void banner ()
{
	cout << endl << "             .--``..---.                " << endl;
	cout << "         .````--:ohdmNms/`         " << endl;
	cout << "          -:/+++/-.:smNd+          " << endl;
	cout << "       ```..--:ohmNNdhh.           " << endl;
	cout << "     `-. `.``.-+sosshd.         :. " << endl;
	cout << "   -os--/sosdmmNNMMNy         .+// " << endl;
	cout << "  :h+.+hNNMMMNNNMMNm/      `/yNN.` " << endl;
	cout << " .do/oNNMMMMMmohs+:`    .+hNMMMM-` " << endl;
	cout << " `yohNhNNNMh-           dosNMMMmo- " << endl;
	cout << "  -mN+hMMMy             .smNMNdd/+`" << endl;
	cout << "   yN.hMMh               +NMMNmhds:" << endl;
	cout << "   +N//m+                 .osshyho " << endl;
	cout << "  ..smhh                           " << endl;
	cout << "   ::oNmy-                         " << endl;
	cout << "      .//yhs/:`                    " << endl;
	cout << "          :ymNN/                   " << endl;
	cout << "         .-+shdho.                 " << endl;
	cout << "             `.--..`          " << endl << endl;
}

int main()
{
	char input[256];
	char p3[] = "y_t";
	char f07[] = "1t5";
	char f11[] = "gh";
	char f03[] = "_tw";
	char f02[] = "nty";
	char p1[] = "tw";
	char f04[] = "0_r";
	char f08[] = "_ar";
	char p4[] = "wo";
	char p2[] = "ent";
	char pass[11];  // twenty_two
	strcpy(pass,p1);
	strcat(pass,p2);
	int result;
	banner();
	cout << " one rabbit, two rabbit... " << endl << " > ";
	cin >> input;
	strcat(pass,p3);
	strcat(pass,p4);
		
	result = strcmp( input, pass );
	
	if( result == 0 )
	{
		char f01[] = "Tw3";
		char f09[] = "3_e";
		char f06[] = "bb";
		char f05[] = "4";
		char f10[] = "n0u";
		char flag[31]; //Tw3nty_tw0_r4bb1t5_ar3_en0ugh
		strcpy(flag,f01);
		strcat(flag,f02);
		strcat(flag,f03);
		strcat(flag,f04);
		strcat(flag,f05);
		strcat(flag,f06);
		strcat(flag,f07);
		strcat(flag,f08);
		strcat(flag,f09);
		strcat(flag,f10);
		strcat(flag,f11);
		cout << endl << "fwhibbit{" << flag << "} " << endl << endl;
	}
	else 
	{
		cout << " Not enough rabbits :( " << endl;
	}
	return 0;
}
