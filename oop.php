<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_POST["submit"])) {
    $jumlah_l = $_POST['jumlah'];
    $jenis = $_POST['bakar'];

    class Shell {
        public $harga,
                $jenis,
                $ppn = 0.1;

        public function __construct($jenis, $harga) {
            $this->jenis = $jenis;
            $this->harga = $harga;
        }
    }

    class Beli extends Shell {
        public $jumlah;

        public function __construct($jenis, $jumlah) {
            parent::__construct($jenis, $this->getHarga($jenis));
            $this->jenis = $jenis;
            $this->jumlah = $jumlah;
        }

        public function totalHarga() {
            $subTotal = $this->harga * $this->jumlah;
            $ppn = $subTotal * $this->ppn;
            $total = $subTotal + $ppn;
            return $total;
        }

        public function getHarga($jenis) {
            switch ($jenis) {
                case 'Shell Super':
                    return 15420 ;              
                case 'Shell Super V-Power':
                    return  16130;              
                case 'Shell Super V-Power Diesel':
                    return  18310;              
                case 'Shell Super V-Power Nitro':
                    return  16510;              
                default:
                    return 0;
            }
        }
    }

    $beli = new Beli($jenis, $jumlah_l);
    echo "<center>--------------------------------------------- <br>";
    echo "Anda membeli bahan bakar minyak tipe " . $beli->jenis . "<br>";
    echo "Dengan jumlah " . $beli->jumlah . " liter.<br>";
    echo "Total harga adalah: Rp. " . number_format($beli->totalHarga()) . "<br>";   
    echo "--------------------------------------------- </center><br>";
}
?>
<center>
    <form action="" method="post">
        <table>
            <tr>
                <td>Masukkan Jumlah Liter</td>
                <td>:</td>
                <td><input type="number" name="jumlah" id="jumlah"></td>
            </tr>
            <tr>
                <td>Pilih Tipe Bahan Bakar</td>
                <td>:</td>
                <td><select name="bakar" nama="bakar" id="bakar">
                        <option value="Shell Super">Shell Super</option>
                        <option value="Shell Super V-Power">Shell Super V-Power</option>
                        <option value="Shell Super V-Power Diesel">Shell Super V-power Diesel</option>
                        <option value="Shell Super V-Nitro">Shell Super V-Nitro</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                <button type="submit" name="submit">Beli</button>
                </td>
            </tr>
        </table>
    </form>
    </center>
</body>
</html>
