<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/head.php") ?>

<body class="nav-fixed">
    <form action="" method="post" autocomplete="off">
        <div id="mapid" style="height: 100vh">
            <input type="text" name="id_pengaduan" id="id_pengaduan" value="<?= $id_pengaduan ?>" hidden>
        </div>
    </form>
    <?php $this->load->view("_partials/js.php") ?>
</body>
<script>
    var id_pengaduan;
    var lang;
    var long;
    id_pengaduan = document.getElementById('id_pengaduan').value;
    console.log(id_pengaduan)
    $.ajax({
        url: "<?php echo base_url() . "Pengaduan/detailmaps" ?>",
        method: "POST",
        data: {
            id_pengaduan: id_pengaduan
        },
        dataType: "json",
        success: function(data) {
            var no = 1;
            for (var i = 0; i < data.length; i++) {
                lang = data[i].langitude;
                long = data[i].longitude;
            }
            map(lang, long)
        },
    });


    function map(lang, long) {
        var mymap = L.map('mapid').setView([lang, long], 13);
        var marker = L.marker([lang, long]).addTo(mymap);
        L.circle([lang, long], {
            radius: 200
        }).addTo(mymap);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoicnlhbmhhcnRhZGk5OTkiLCJhIjoiY2tndXBlc2s2MDU4MjM0czViMjBna3Y1NCJ9.z8GIwiPNNy8E4QPYIP6tEg'
        }).addTo(mymap);
    }
</script>

</html>