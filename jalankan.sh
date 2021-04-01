blue='\033[34;1m'
green='\033[32;1m'
purple='\033[35;1m'
cyan='\033[36;1m'
red='\033[31;1m'
white='\033[37;1m'
yellow='\033[33;1m'

echo -e $white'|\---/|'
echo -e $white'| o_o |  [ Aplikasi Sistem Inventory ]'
echo -e $white' \_^_/\n'
echo -e $green"{ Coder: 'Fajar Firdaus' }\n"

echo -e $yellow'[/] Tunggu sebentar..';
#composer install
#echo -e $green'[/] Menginstall package selesai'
./artisan db:create inventory
echo -e $green '[+] Membuat Database Selesai..'
./artisan migrate 
echo -e $green '[+] Membuat Tabel Selesai...'
sleep 1 
echo -e $green '[+] Menjalankan Server...'
./artisan serve
