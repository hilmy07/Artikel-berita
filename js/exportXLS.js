function kategoriTableToExcel() {
  $("#kategori_table").table2excel({
      name: "Daftar Kategori",
      filename: "kategori.xls"
  });
}

function artikelTableToExcel() {
  $("#artikel_table").table2excel({
      name: "Daftar Artikel",
      filename: "artikel.xls"
  });
}