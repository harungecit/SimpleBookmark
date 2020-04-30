<?php
include ("inc/header.php");
?>
	
		<div class="section no-pad-bot" id="index-banner">
   <div class="container">
      <br><br>
			
<div class="row center">
	
      <table class="highlight" id="dataResult">
        <thead>
          <tr>
              <th onclick="sortTable(0)">Owner</th>
              <th onclick="sortTable(1)">Title</th>
              <th onclick="sortTable(2)">Note</th>
			  <th onclick="sortTable(3)">Date</th>
			  <th>Actions</th>
          </tr>
        </thead>

		  <?php
		  $query=$conn->prepare('SELECT `bookmark`.`id`, `bookmark`.`title`, `bookmark`.`url`, `bookmark`.`note`, `bookmark`.`created`,  `user`.`name`
FROM `bookmark` 
	LEFT JOIN `user` ON `bookmark`.`owner` = `user`.`id`');
          $query->execute();
          $bookmarkList=$query-> fetchAll(PDO::FETCH_OBJ);
		  ?>
		  
        <tbody>
			
						 <?php
			 foreach($bookmarkList as $bookmarks){ 
			$bname = $bookmarks->name;
			$btitle= $bookmarks->title;
		    $bnote = $bookmarks->note;
			$bdate = $bookmarks->created;
			$burl  = $bookmarks->url;
			$bid   = $bookmarks->id;
				
			?>
			
			
          <tr>
            <td><?php echo $bname; ?></td>
			  <td><a href="<?php echo $burl; ?>" target=_blank><?php echo $btitle; ?></a></td>
            <td>
				<?php echo $bnote; ?> </td>
			<td><?php echo date("m-d-y", strtotime($bdate)); ?></td>
			<td><a class="waves-effect waves-light btn-medium" href="delete.php?id=<?php echo $bid; ?>"><i class="material-icons">delete</i></a> 
				<a class="btn-medium waves-effect waves-light modal-trigger" href="#show<?php echo $bid; ?>"><i class="material-icons">visibility</i></a>
				</td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
  
	<?php foreach ($bookmarkList as $b): ?>

	<div id="show<?php echo $b->id; ?>" class="modal">
    <div class="modal-content">
		<h4><?php echo $b->title; ?></h4>
				
		<table>
			<tr>
    <td class="tg-0lax">Owner:</td>
    <td class="tg-0lax"><?php echo $b->name; ?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Title:</td>
    <td class="tg-0lax"><?php echo $b->title; ?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Notes:</td>
    <td class="tg-0lax"><?php echo $b->note; ?></td>
  </tr>
  <tr>
    <td class="tg-0lax">URL:</td>
	  <td class="tg-0lax"><a href="<?php echo $b->url; ?>" target=_blank><?php echo $b->url; ?></a></td>
  </tr>
	<tr>
    <td class="tg-0lax">Date:</td>
    <td class="tg-0lax"><?php echo date("m-d-y", strtotime($b->created)); ?></td>
  </tr>
		</table>
		
		</div></div>

	<?php endforeach; ?>
	
	
	
	
</div>
</div>
</div>
<div class="row right">
	<div class="col s1 left">
		  <a class="btn-floating btn-large waves-effect waves-light red modal-trigger" href="#add"><i class="material-icons">add</i></a>
		<div class="col s1 left"></div>


 <div id="add" class="modal">
    <div class="modal-content">
      <h4>New Bookmark</h4>
        <form action="add.php" method="POST">
			  <div class="input-field col s12">
			<select name="user_id" id="user_id">
				
				<?php
		  $query=$conn->prepare('SELECT * FROM user');
          $query->execute();
          $userList=$query-> fetchAll(PDO::FETCH_OBJ);
				
		  ?>
				
      <option value="0" disabled selected>Choose Owner</option>
				<?php
			 foreach($userList as $users){ 
				$uname = $users->name;
				$uid   = $users->id;
				
				?>
      <option value="<?php echo $uid; ?>"><?php echo $uname; ?></option>
      <?php } ?>
    </select>
				  <label>Choose Owner</label></div>
			
			<div class="input-field col s12">
          <input placeholder="Title" name="title" id="title" type="text" class="validate" required>
          <label for="title">Title</label>
        </div>
			
			<div class="input-field col s12">
          <input placeholder="URL" name="url" id="url" type="text" class="validate" required>
          <label for="url">URL</label>
        </div>
			
			<div class="input-field col s12">
          <textarea id="note" name="note" class="materialize-textarea" required></textarea>
          <label for="note">Notes</label>
        </div>
			
		
		
		
	 			<div class="input-field col s12">
<button class="btn waves-effect waves-light right" type="submit">ADD<i class="material-icons right">send</i></button>
	 </div>
    </form>
  </div>
</div>
<script>
$(document).ready(function(){
    $('.modal').modal();
  });
	

  $(document).ready(function(){
    $('select').formSelect();
  });
	
	
</script>
</div>

<br><br><br><br><br><br><br>
	
	
	<script src="js/sort.js"></script>

	
	
<?php include("inc/footer.php"); 
$s = $_GET["action"];
	if($s == "Success"){
		echo "<script>M.toast({html: 'Success'})</script>";
	}
	
?>
