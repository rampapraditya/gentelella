<?php
namespace App\Libraries;

/**
 * Description of Modul
 *
 * @author Rampa Praditya <https://pramediaenginering.com/>
 */
class Modul {

    public function pesan_halaman($pesan, $halaman) {
        $string_pesan = "<script type='text/javascript'> alert('" . $pesan . "');";
        $string_pesan .= "window.location = '" . base_url() .'/'. $halaman . "';</script>";
        echo $string_pesan;
    }

    public function pesan($pesan) {
        $string_pesan = "<script type='text/javascript'> alert('" . $pesan . "');</script>";
        echo $string_pesan;
    }
    
    public function pesanlog($pesan) {
        $string_pesan = "<script type='text/javascript'> console.log('".$pesan."') ;</script>";
        echo $string_pesan;
    }

    public function halaman($halaman) {
        $string_pesan = "<script type='text/javascript'> ";
        $string_pesan .= "window.location = '" . base_url() .''. $halaman . "';</script>";
        echo $string_pesan;
    }

    function getAwalAkhirBulan()
    {
        date_default_timezone_set("Asia/Jakarta");

        // Tanggal awal bulan ini
        $startOfMonth = date('Y-m-01');

        // Tanggal akhir bulan ini
        $endOfMonth = date('Y-m-t');

        return [ 'awal' => $startOfMonth, 'akhir' => $endOfMonth];
    }

    public function WaktuSekarang() {
        date_default_timezone_set("Asia/Jakarta");
        return date("H:i:s");
    }
    
    public function WaktuSekarang2() {
        date_default_timezone_set("Asia/Jakarta");
        return date("H:i");
    }

    public function TanggalSekarangF() {
        date_default_timezone_set("Asia/Jakarta");
        return date("d-m-Y");
    }
    
    public function TanggalSekarang() {
        date_default_timezone_set("Asia/Jakarta");
        return date("Y-m-d");
    }

    public function tglKode() {
        date_default_timezone_set("Asia/Jakarta");
        return date("dmY");
    }

    public function TanggalWaktu() {
        date_default_timezone_set("Asia/Jakarta");
        return date("Y-m-d H:i:s");
    }

    public function getTahun() {
        date_default_timezone_set("Asia/Jakarta");
        return date("Y");
    }

    public function getBulan() {
        date_default_timezone_set("Asia/Jakarta");
        return date("m");
    }

    public function getCurTime() {
        date_default_timezone_set("Asia/Jakarta");
        return date("YmdHis");
    }

    public function resetAI() {
        $stringreset = "ALTER TABLE dosen AUTO_INCREMENT = 1;";
        return $stringreset;
    }

    public function TambahTanggal($tgl, $tambah) {
        return date('Y-m-d', strtotime('+' . $tambah . ' days', strtotime($tgl)));
    }

    public function TambahMenit($waktu_awal, $menit) {
        date_default_timezone_set("Asia/Jakarta");
        $date = date_create($waktu_awal);
        date_add($date, date_interval_create_from_date_string($menit . ' minutes'));
        return date_format($date, 'H:i:s');
    }

    public function KurangMenit($waktu_awal, $menit) {
        date_default_timezone_set("Asia/Jakarta");
        $date = date_create($waktu_awal);
        date_add($date, date_interval_create_from_date_string('-' . $menit . ' minutes'));
        return date_format($date, 'H:i:s');
    }
    
    public function kurang_bulan($tgl_awal, $tgl_akhir) {
        $d1 = new \DateTime($tgl_awal);
        $d2 = new \DateTime($tgl_akhir);
        $interval = $d2->diff($d1);
        return $interval->format('%m');
    }

    public function getUsia($tglLahir) {
        $biday = new \DateTime($tglLahir);
        $today = new \DateTime();
        $diff = $today->diff($biday);
        return $diff->y;
    }

    function getWeeks($date, $rollover) {
        $cut = substr($date, 0, 8);
        $daylen = 86400;
        $timestamp = strtotime($date);
        $first = strtotime($cut . "01");
        $elapsed = (($timestamp - $first) / $daylen) + 1;
        $i = 1;
        $weeks = 0;
        for ($i == 1; $i <= $elapsed; $i++) {
            $dayfind = $cut . (strlen($i) < 2 ? '0' . $i : $i);
            $daytimestamp = strtotime($dayfind);
            $day = strtolower(date("l", $daytimestamp));
            if ($day == strtolower($rollover)) {
                $weeks++;
            }
        }
        if ($weeks == 0) {
            $weeks++;
        }
        return $weeks;
    }

    function weeks_in_month($year, $month, $start_day_of_week) { // Minggu pada bulan ini
        // Total number of days in the given month.
        $num_of_days = date("t", mktime(0, 0, 0, $month, 1, $year));

        // Count the number of times it hits $start_day_of_week.
        $num_of_weeks = 0;
        for ($i = 1; $i <= $num_of_days; $i++) {
            $day_of_week = date('w', mktime(0, 0, 0, $month, $i, $year));
            if ($day_of_week == $start_day_of_week) {
                $num_of_weeks++;
            }
        }
        return $num_of_weeks;
    }

    function HariIni() {
        date_default_timezone_set("Asia/Bangkok");
        $tanggal = date("Y-m-d");
        $day = date('D', strtotime($tanggal));
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        return $dayList[$day];
    }

    function namaHariTglTertentu($tanggal) {
        $day = date('D', strtotime($tanggal));
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        return $dayList[$day];
    }

    function weeks($month, $year) {
        $lastday = date("t", mktime(0, 0, 0, $month, 1, $year));
        $no_of_weeks = 0;
        $count_weeks = 0;
        while ($no_of_weeks < $lastday) {
            $no_of_weeks += 7;
            $count_weeks++;
        }
        return $count_weeks;
    }
    
    public function get_nama_bulan($month_num){
        $month_name = date("F", mktime(0, 0, 0, $month_num, 10));
        return $month_name;
    }

    public function jmlharibulanini() {
        date_default_timezone_set("Asia/Jakarta");
        $calendar = CAL_GREGORIAN;
        $month = date('m');
        $year = date('Y');
        $hari = cal_days_in_month($calendar, $month, $year);
        return $hari;
    }

    public function jmlharibulan($bulan, $tahun) {
        date_default_timezone_set("Asia/Jakarta");
        $calendar = CAL_GREGORIAN;
        $hari = cal_days_in_month($calendar, $bulan, $tahun);
        return $hari;
    }

    public function TimeToLong($input) {
        $long = strtotime($input);
        return $long;
    }

    public function LongToTime($input) {
        return date('H:i:s', $input);
    }

    public function enkrip_pass($str) {
        $kunci = '979a218e0632df2935317f98d47956c7';
        $hasil = "";
        for ($i = 0; $i < strlen($str); $i++) {
            $karakter = substr($str, $i, 1);
            $kuncikarakter = substr($kunci, ($i % strlen($kunci)) - 1, 1);
            $karakter2 = chr(ord($karakter) + ord($kuncikarakter));
            $hasil .= $karakter2;
        }
        return urlencode(base64_encode($hasil));
    }

    public function dekrip_pass($str) {
        $str2 = base64_decode(urldecode($str));
        $hasil = '';
        $kunci = '979a218e0632df2935317f98d47956c7';
        for ($i = 0; $i < strlen($str2); $i++) {
            $karakter = substr($str2, $i, 1);
            $kuncikarakter = substr($kunci, ($i % strlen($kunci)) - 1, 1);
            $karakter2 = chr(ord($karakter) - ord($kuncikarakter));
            $hasil .= $karakter2;
        }
        return $hasil;
    }

    public function image_text($path) {
        $imgbinary = fread(fopen($path, "r"), filesize($path));
        $img_str = base64_encode($imgbinary);
        return $img_str;
    }

    function contain($keterangan, $mengandung) {
        $status = FALSE;
        if (strpos($keterangan, $mengandung) !== false) {
            $status = TRUE;
        }
        return $status;
    }

    public function img_resize($target, $newcopy, $w, $h, $ext, $scala) {
        list($w_orig, $h_orig) = getimagesize($target);

        // menggunakan scala
        if ($scala == TRUE) {
            $scale_ratio = $w_orig / $h_orig;
            if (($w / $h) > $scale_ratio) {
                $w = $h * $scale_ratio;
            } else {
                $h = $w / $scale_ratio;
            }
        }

        $img = "";
        $ext = strtolower($ext);

        if ($ext == "gif") {
            $img = imagecreatefromgif($target);
        } else if ($ext == "png") {
            $img = imagecreatefrompng($target);
        } else {
            $img = imagecreatefromjpeg($target);
        }

        $tci = imagecreatetruecolor($w, $h);
        // imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)

        imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
        imagejpeg($tci, $newcopy, 80);
    }

    public function terbilang($x) {
        $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        if ($x < 12) {
            return " " . $abil[$x];
        } else if ($x < 20) {
            return $this->terbilang($x - 10) . "belas";
        } else if ($x < 100) {
            return $this->terbilang($x / 10) . " puluh" . $this->terbilang($x % 10);
        } elseif ($x < 200) {
            return " seratus" . $this->terbilang($x - 100);
        } elseif ($x < 1000) {
            return $this->terbilang($x / 100) . " ratus" . $this->terbilang($x % 100);
        } elseif ($x < 2000) {
            return " seribu" . $this->terbilang($x - 1000);
        } elseif ($x < 1000000) {
            return $this->terbilang($x / 1000) . " ribu" . $this->terbilang($x % 1000);
        } elseif ($x < 1000000000) {
            return $this->terbilang($x / 1000000) . " juta" . $this->terbilang($x % 1000000);
        }
    }

    public function konversi_ke_kecil($jml_kecil, $jml_besar, $jml_datang_besar) {
        $hasil = ($jml_kecil / $jml_besar) * $jml_datang_besar;
        return $hasil;
    }

    public function konversi_ke_besar($stok_konversi, $jml_awal, $isi_besar) {
        $hasil = ($stok_konversi / $jml_awal) * $isi_besar;
        return $hasil;
    }

    public function format_mata_uang($harga) {
        return number_format($harga, 0, '', '.');
    }

    public function enkrip_url($string) {
        $secret_key = "1111111111111111";
        $secret_iv = "2456378494765431";
        $encrypt_method = "aes-256-cbc";
        // hash
        $key = hash("sha256", $secret_key);
        // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
        $iv = substr(hash("sha256", $secret_iv), 0, 16);
        //do the encryption given text/string/number
        $result = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($result);
        return $output;
    }

    public function dekrip_url($string) {
        $secret_key = "1111111111111111";
        $secret_iv = "2456378494765431";
        $encrypt_method = "aes-256-cbc";
        // hash
        $key = hash("sha256", $secret_key);
        // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
        $iv = substr(hash("sha256", $secret_iv), 0, 16);
        //do the decryption given text/string/number
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        return $output;
    }
    
    public function merah($kata) {
        return '<span class="badge badge-danger">'.$kata.'</span>';
    }
    
    public function hijau($kata) {
        return '<span class="badge badge-danger">'.$kata.'</span>';
    }
    
    public function getFileName($path) {
        $file_name = pathinfo($path, PATHINFO_FILENAME);
        return $file_name;
    }
    
    public function getFileExt($path) {
        $ext_file = pathinfo($path, PATHINFO_EXTENSION);
        return $ext_file;
    }
    
    public function antixss($text) {
        return htmlentities($text, ENT_QUOTES, 'UTF-8');
    }
    
    public function input_from_text_editor($data) {
        $data1 = trim($data);
        $data2 = stripslashes($data1);
        $data3 = htmlspecialchars($data2);
        return $data3;
    }
    
    public function buat_folder($path) {
        //create the folder if it's not exists
        if(!is_dir($path)) {
            mkdir($path,0755,TRUE);
        } 
    }
    
    public function cekfile($url_file) {
        $status = FALSE;
        $ch = curl_init($url_file);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if($responseCode == 200){
            $status = TRUE;
        }
        return $status;
    }
    
    public function info_file($file) {
        $data['name'] = $file->getName();// Mengetahui Nama File
        $data['originalName'] = $file->getClientName();// Mengetahui Nama Asli
        $data['tempfile'] = $file->getTempName();// Mengetahui Nama TMP File name
        $data['ext'] = $file->getClientExtension();// Mengetahui extensi File
        $data['type'] = $file->getClientMimeType();// Mengetahui Mime File
        $data['size'] = $file->getSize(); // Ukuran dalam byte
        $data['size_kb'] = $file->getSizeByUnit('kb'); // Ukuran dalam kilobyte
        $data['size_mb'] = $file->getSizeByUnit('mb'); // Ukuran dalam megabyte
        $data['namabaru'] = $file->getRandomName();//define nama fiel yang baru secara acak
        
        return $data;
    }
    
    public function getPathApp() {
        return 'uploads/';
    }
}
