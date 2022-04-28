<table border="1">
    <tr>
        <th scope="col">Keterangan</th>
        <th scope="col">Pemasukan</th>
        <th scope="col">Pengeluaran</th>
        <th scope="col">Jumlah</th>
    </tr>
    <tbody>
        <?php
        $query = $this->db->query("SELECT * FROM dummy");
        $i = 1;
        foreach ($query->result() as $row) {
            $total[] = $row->pemasukan;
            $sum = array_sum($total);

            if ($row->dari == $i) {
                $judul = "USAHA ".$i;
                $penutup = "SURPLUS USAHA ".$i;
                echo
                "<tr>
                <td>" . $judul . "</td>
                <td></td>						
                <td></td>						
                <td></td>						
            </tr>".
                "<tr>
                <td>" . $row->keterangan . "</td>
                <td>" . number_format($row->pemasukan) . "</td>						
                <td>" . number_format($row->pengeluaran) . "</td>						
                <td>" . number_format($sum) . "</td>						
            </tr>".
            "<tr>
                <td>" . $penutup . "</td>
                <td></td>						
                <td></td>						
                <td></td>						
            </tr>";
            } $i++;
        }
        ?>
    </tbody>
</table>