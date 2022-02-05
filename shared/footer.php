<script src="<?php echo BASE_URL; ?>assets/vendors/js/vendor.bundle.base.js"></script>
<script src="<?php echo BASE_URL; ?>assets/vendors/chart.js/Chart.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/jquery.cookie.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL; ?>assets/vendors/js/vendor.bundle.base.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/off-canvas.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/hoverable-collapse.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/misc.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/dashboard.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/todolist.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/file-upload.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</body>

</html>