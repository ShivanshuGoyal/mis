<?php

require_once('../Includes/SessionAuth.php');

require_once('../Includes/FeedbackLayout.php');

	drawHeader("AEE");

if(isset($_GET['si2']))
{
echo $_GET['si2'];

}


require_once('../Includes/ConfigSQL.php');

	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}

$data = $data2 = $data3 = array();
$datares = mysql_query('SELECT * FROM campus_maintenance_inventory_category_elec');
$data2res = mysql_query('SELECT * FROM campus_maintenance_inventory_inventory');
$datacount=mysql_query('SELECT count(*) as count , description FROM campus_maintenance_inventory_inventory GROUP BY description');
while($datarow = mysql_fetch_array($datares)){
    $data[$datarow['category_name']] = $datarow['category_name'];

}
while($data2row = mysql_fetch_array($data2res)){
    $data2[$data2row['category']][$data2row['description']] = $data2row['description'];
}
while($data2count = mysql_fetch_array($datacount))
{	
	
   $data3[$data2count['description']][$data2count['count']] = $data2count['count'];
}

?>

<script>
inputs=1;
function form_submit()
{
	flag = true;
	for(i=1; i<=inputs; i++){
		//alert(i);
		if($("input[name=avail_order_"+i+"]").val()=="" || $("input[name=req_order_"+i+"]").val()==""){
			alert("Please fill all values first.");
			flag = false;
		}
		//alert($("input[name=avail_order_"+i+"]").val)
		if(Number($("input[name=avail_order_"+i+"]").val()) < Number($("input[name=req_order_"+i+"]").val())){
			alert("Value for order "+$("select[name=item_order_"+i+"]").val()+" is invalid.");
			flag = false;
		}
	}
	if(flag) $("input#no_of_inputs").val(inputs);
	return flag;
	
}
</script>
<form method="POST" action="test.php" onsubmit="return form_submit()">
	<table name="divmain" align="center">
	<tr><th>Category</th><th>Item</th><th>Available</th><th>Required</th></tr>
	<tr id="order_1">
			
			<td><select name="categ_order_1" id="s1" onChange="selectCategory(this.value);">
			<option value="Select">Select</option>
				<?php foreach($data as $sa) { ?>
				<option value="<?php echo $sa; ?>"><?php echo $sa; ?></option>
				<?php } ?>
			</select>
			</td>
			<td>
			<select name="item_order_1" id="s2" onChange="selectItem(this.value);">
				<option value="Select">Select</option>
			</select>
			</td>

		<td>
		<input type="txt" id="txt1" name="avail_order_1" value="" readonly></input>
		</td>
		<td>
		<input type="txt" id="txt2" name="req_order_1"   value="" ></input>
		</td>
	</tr>
	</table>
	<div align="center">
		<input type="hidden" value="1" name="no_of_inputs" id="no_of_inputs" />
	<input name = "btnaddtest" onclick = "btnadd(this)" type = "button" value = "Add Another" /><br/>	
	<input type="submit" name = "btnsubmit" onclick = "" value = "SUBMIT" />
	</div>
	</form>
<br/><br/><br/><br/><br/><br/><br/>

<script>

function selectItem(str)
{


 var xmlhttp;
if(str=="")
{
	$("input[name=req"+ this.parentNode.id +"]:last").val("");
}
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    $("input[id=txt1]:last").val(xmlhttp.responseText);
	//document.getElementById("txt1").innerHTML="readonly";
    }
  }
xmlhttp.open("GET","get_amount_item.php?q="+str,true);
xmlhttp.send();

}

</script>
<script>


function selectCategory(x) {
	
	if(x!="Select"){
	
    <?php foreach ($data as $sa) {?>
        if (x == '<?php echo $sa; ?>') {
            option_html = "<option value=\"Select\">Select</option>";
            <?php if (isset($data2[$sa])) { ?> // Make sure position is exist
                <?php foreach ($data2[$sa] as $value) { ?>
                    option_html += "<option value='<?php echo $value; ?>' > <?php echo $value; ?></option>";
                <?php } ?>
            <?php } ?>
            $("select[id=s2]:last").html(option_html);
        }
    <?php } ?>
	}

	else {
				$("select[id=s2]:last").html("<option value=\"Select\">Select</option>");
	}

}




</script >
<script type="text/javascript">



function btnadd(btnclick)
	{
		if($(btnclick).attr('name') == "btnaddtest")
		{
			clone=null;
			//alert($("select[id=s1]:last").val());
			if($("select[id=s1]:last").val() == 'Select' || $("select[id=s2]:last").val() == 'Select')
				return;
			$("table[name=divmain]").append(clone = $("tr[id=order_1]:last").clone());
			clone.find("input#txt1").attr("name", 'avail_order_'+ ++inputs );
			clone.find("input#txt2").attr("name", 'req_order_' + inputs);
			clone.find("select#s1").attr("name", 'categ_order_'+ inputs );
			clone.find("select#s2").attr("name", 'item_order_' + inputs);
			clone.id = 'order_' + inputs;
			clone.find("input#txt1").val("");
			clone.find("input#txt2").val("");
			clone.find("input#s2").html("");
			
		}
		
		
	}


</script>

</body>
</html>