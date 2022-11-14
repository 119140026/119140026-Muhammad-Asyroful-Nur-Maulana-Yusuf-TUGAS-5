<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>119140026-Tugas 5</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    </head>
    <body>
        <div class="container">
            <br />
            <h2 align="center">DATA MAHASISWA ITERA</h2><br />
            <select name="multi_search_filter" id="multi_search_filter" multiple class="form-control selectpicker">
            <?php
            include('dbcon.php');
            $query = $conn->query("SELECT DISTINCT prodi FROM mahasiswa ORDER BY nim ASC");
            {
            $prodi = $row->prodi;
                if ($prodi='IF'){
                    echo '<option value="'.$prodi.'">Teknik Informatika</option>'; 
                }
                if ($prodi='GL'){
                    echo '<option value="'.$prodi.'">Teknik Geologi</option>';
                }
                if ($prodi='EL'){
                    echo '<option value="'.$prodi.'">Teknik Elektro</option>';
                }
                if ($prodi='TG'){
                    echo '<option value="'.$prodi.'">Teknik Geofisika</option>';
                }
                if ($prodi='ME'){
                    echo '<option value="'.$prodi.'">Teknik Mesin</option>';
                }
            }
            
            ?>
            </select>
            <input type="hidden" name="hidden_country" id="hidden_country" />
            <div style="clear:both"></div>
            <br />
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <br />
            <br />
            <br />
            <footer>  &copy; Muhammad Asyroful Nur Maulana Yusuf (119140026)</footer>
        </div>
        
<script>
$(document).ready(function(){
    load_data();
    function load_data(query='')
    {
        $.ajax({
            url:"fetch.php",
            method:"POST",
            data:{query:query},
            success:function(data)
            {
                $('tbody').html(data);
            }
        })
    }
    $('#multi_search_filter').change(function(){
        $('#hidden_country').val($('#multi_search_filter').val());
        var query = $('#hidden_country').val();
        load_data(query);
    });
});
</script>
</body>
</html>