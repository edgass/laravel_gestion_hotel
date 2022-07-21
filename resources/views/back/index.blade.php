<!DOCTYPE html>
<html lang="en">
@include("back/head")
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper boxed-wrapper">
@include("back/header")
  <!-- Left side column. contains the logo and sidebar -->
  @include("back/sidebar")
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Dashboard</li>
      </ol>
    </div>
    
    <!-- Main content -->
    @include("back/content")
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
  @include("back/footer")
</div>
<!-- ./wrapper --> 

@include("back/js")
</body>
</html>
