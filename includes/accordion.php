<!--START of accordion -->

<style>
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 8px;
  width: 100%;
  border: none;
  text-align: center;
  outline: none;
  font-size: 12px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc;

}

.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}
</style>
</head>
<body>


<button class="accordion">Naujo vartotojo idiegimas </button>
<div class="panel">
  <!-- Page Content -->
    <div class="container">

<form action ="" method="post" enctype="multipart/form-data">
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">

                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                       <h6 class="text-center"><?php echo $message; ?></h6>
                       <div class="form-group">
                       <select name="user_role" id="">
                           <option value="user">Vartotojo teisės</option>
                           <option value="admin">Administratorius</option>
                           <option value="user">Darbuotojas</option>
                       </select>
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Vartotojo vardas">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Epaštas">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Slaptažodis">
                        </div>

                        <input type="submit" name="submit" id="btn-login" class="btn btn-outline-light" value="Užregistruoti vartotoją">
                    </form>

                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->

</section>
</form>

</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}
</script>


<!--END of accordion -->
