<?php
    require "connection.php";
    $invoice=$_GET['id'];
    $sql="SELECT * FROM expensedetail WHERE invoice = '$invoice';";
	$query=mysqli_query($conn,$sql);
    $result=mysqli_fetch_assoc($query);
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Invoice</title>
		<link rel="stylesheet" href="Invoice.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
		<script>
			const button = document.getElementById('download');
			function generatePDF() 
			{
				const element=document.getElementById('letter');
				html2pdf().from(element).save();
			}
			button.addEventListener('click',generatePDF);
		</script>
	</head>
	<body id="letter">
		<div class="heading">INVOICE</div>
		<div class="projdetail">
			<strong>PROJECT NAME : </strong><?php echo $result['ptitle'];?><br>
			<strong>INVOICE FOR  : </strong><?php echo $result['person'];?>
		</div>
		<table class="meta">
			<tr>
				<th>Invoice #</th>
				<td><?php echo $result['invoice'];?></td>
			</tr>
			<tr>
				<th>Completion Date</th>
				<td><?php echo $result['dat'];?></td>
			</tr>
		</table>
		<table>
			<tr>
			<th>Item</th>
			<th>Description</th>
			<th>Rate</th>
			<th>Quantity</th>
			<th>Price</th>
			</tr>
			<?php
				if(mysqli_num_rows($query)>0)
				{
					echo "<tr>";
					echo "<td>" . $result['spendedon']."</td>";
					echo "<td>" . $result['detail']."</td>";
					echo "<td>" . "₹ ".$result['amount']."</td>";
					echo "<td>" . "1"."</td>";
					echo "<td>" . "₹ ".$result['amount']."</td>";
					echo "</tr>";
				}
			?>
		</table>
		<table class="balance">
			<tr>
				<th>Total Amount</th>
				<td>₹<?php echo $result['amount'];?></td>
			</tr>
		</table>
		<div class="row">
			<h4>Additional Notes</h4>*GST is not included.<br>All Invoice Bills are subjected to the Owner and Company involved.
		</div><button id="download">Download</button></div>
	</body>
</html>