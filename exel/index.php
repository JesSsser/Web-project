<?php 
include_once("db_connect.php");
include("export_data.php");
include("header.php"); 
?>
<title>tech</title>
<?php include('container.php');?>
<div class="container">	
	<h2>Export Data to Excel </h2>
	<div class="well-sm col-sm-12">
		<div class="btn-group pull-right">	
			<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">					
				<button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info">Export to excel</button>
			</form>
		</div>
	</div>				  
	<table id="" class="table table-striped table-bordered">
		<tr>
		    <th>id_poste</th>
            <th>id_user</th>
            <th>message</th>
            <th>photo</th>
            <th>date_avis</th>
		</tr>
		<tbody>
			<?php foreach($developer_records as $developer) { ?>
			   <tr>
		   <td><?php echo $developer['id_poste']; ?></td>
            <td><?php echo $developer['id_user']; ?></td>
            <td><?php echo $developer['message']; ?></td>
            <td><?php echo $developer['photo']; ?></td>
         
            <td><?php echo $developer['date_poste']; ?></td>
			   </tr>
			<?php } ?>
		</tbody>
    </table>	
	<div style="margin:50px 0px 0px 0px;">
		<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="#">Back to Tutorial</a>		
	</div>
</div>
<?php include('footer.php');?>




