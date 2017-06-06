<div class="categories">
	<ul>		
		<h3 style="font-family: inherit;">Categories</h3>
		 <?php 
        $kategori = mysqli_query($koneksi, "SELECT Nama_Kategori, kategori.Id_Kategori, 
                  COUNT(produk.Id_Kategori) as jml 
                  FROM kategori LEFT JOIN produk 
                  ON produk.Id_Kategori=kategori.Id_Kategori 
                  GROUP BY Nama_Kategori");

        while($data = mysqli_fetch_array($kategori)){
    
        ?>
	
		<li><a href="front/kategory_filter.php?Id_Kategori=<?php echo $data['Id_Kategori']?>">
		<?php echo $data['Nama_Kategori']; ?><?php echo " ($data[jml])"; ?>
		</a></li>
		
		<?php } ?>
		</div>
		