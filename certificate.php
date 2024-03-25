<!DOCTYPE html>
<html>
    <head>
        <style>
            body{
    margin: 0;
    padding: 0;
    font: 400 .875rem 'Open Sans', sans-serif;
    color: #000000;
    background: #000000;
    position: relative;
    height: 100%;
}
.invoice-container {
    padding: 1rem;
}
.invoice-container .invoice-header .invoice-logo {
    margin: 0.8rem 0 0 0;
    display: inline-block;
    font-size: 1.6rem;
    font-weight: 700;
    color: #000000;
}
.invoice-container .invoice-header .invoice-logo img {
    max-width: 130px;
}
.invoice-container .invoice-header address {
    font-size: 0.8rem;
    color: #000000;
    margin: 0;
}
.invoice-container .invoice-details {
    margin: 1rem 0 0 0;
    padding: 1rem;
    line-height: 180%;
    background: #ffffff;
}
.invoice-container .invoice-details .invoice-num {
    text-align: right;
    font-size: 0.8rem;
}
.invoice-container .invoice-body {
    padding: 1rem 0 0 0;
}
.invoice-container .invoice-footer {
    text-align: center;
    font-size: 0.7rem;
    margin: 5px 0 0 0;
}

.invoice-status {
    text-align: center;
    padding: 1rem;
    background: #808080;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    margin-bottom: 1rem;
}
.invoice-status h2.status {
    margin: 0 0 0.8rem 0;
}
.invoice-status h5.status-title {
    margin: 0 0 0.8rem 0;
    color: #8a99b5;
}
.invoice-status p.status-type {
    margin: 0.5rem 0 0 0;
    padding: 0;
    line-height: 150%;
}
.invoice-status i {
    font-size: 1.5rem;
    margin: 0 0 1rem 0;
    display: inline-block;
    padding: 1rem;
    background: #1a233a;
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
}
.invoice-status .badge {
    text-transform: uppercase;
}

@media (max-width: 767px) {
    .invoice-container {
        padding: 1rem;
    }
}

.card {
    background: #808080;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}

.custom-table {
    border: 1px solid #ffffff;
}
.custom-table thead {
    background: #000000;
}
.custom-table thead th {
    border: 0;
    color: #ffffff;
}
.custom-table > tbody tr:hover {
    background: #ffffff;
}
.custom-table > tbody tr:nth-of-type(even) {
    background-color: #000000;
}
.custom-table > tbody td {
    border: 1px solid #ffffff;
}

.table {
    background: #000000;
    color: #ffffff;
    font-size: .75rem;
}
.text-success {
    color: #c0d64a !important;
}
.custom-actions-btns {
    margin: auto;
    display: flex;
    justify-content: flex-end;
}
.custom-actions-btns .btn {
    margin: .3rem 0 .3rem .3rem;
}
@media print {
               .noprint {
                  visibility: hidden;
               }
            }
</style>
    </head>
<body>
<div class="container">
    <div class="row gutters">
    	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    		<div class="card">
    			<div class="card-body p-0">
    				<div class="invoice-container">
    					<div class="invoice-header">
    
    						<!-- Row start -->
    						<div class="row gutters">
    							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
    								<div class="custom-actions-btns mb-5">
    									<a href="#" class="btn btn-secondary">
    										<i class="icon-printer"><div class = "noprint"><button onclick="window.print()"></i> Print</button></div>
    									</a>
    								</div>
    							</div>
    						</div>
    						<!-- Row end -->
    
    						<!-- Row start -->
    						<div class="row gutters">
    							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
    								<a href="index.html" class="invoice-logo">
    									LEAFNOW
    								</a>
    							</div>
    							<div class="col-lg-6 col-md-6 col-sm-6">
    								<address class="text-right">
                                    Bengaluru<br>
                                    Karnataka- 560001<br>
    									1234567890
    								</address>
    							</div>
    						</div>
    						<!-- Row end -->
    
    						<!-- Row start -->
    						<div class="row gutters">
    							<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
    								<div class="invoice-details">
    									<address>
                                        <?php echo $_POST["name"]; ?><br>
                                        <?php echo $_POST["mobile"]; ?><br> <?php echo $_POST["email"]; ?><br> <?php echo $_POST["addr"]; ?>
    									</address>
    								</div>
    							</div>
    							<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
    								<div class="invoice-details">
    									<div class="invoice-num">
    										
                                        <div id="current_date"></p>
                                        <script>
                                        document.getElementById("current_date").innerHTML = Date();
                                        </script>
    									</div>
    								</div>													
    							</div>
    						</div>
    						<!-- Row end -->
    
    					</div>
    
    					<div class="invoice-body">
    
    						<!-- Row start -->
    						<div class="row gutters">
    							<div class="col-lg-12 col-md-12 col-sm-12">
    								<div class="table-responsive">
    									<table class="table custom-table m-0">
    										<thead>
    											<tr>
    												<th>Items</th>
    												<th>Quantity</th>
    												<th>Total</th>
    											</tr>
    										</thead>
    										<tbody>
    											<tr>
    												<td>
    													PLANTS
    												</td>
    												<td><?php echo $_POST["amount"]; ?></td>
    												<td>Rs.<?php echo $_POST["amount"]; ?></td>
    											</tr>
    											<tr>
    										</tbody>
    									</table>
                                        <h2><center>Dear <?php echo $_POST["name"]; ?>,<br></h1>
                                        <h3><center>Your donation of Rs.<?php echo $_POST["amount"]; ?> is successful, And <?php echo $_POST["amount"]; ?> trees are planted.<br> </h3>
    								</div>
    							</div>
    						</div>
    						<!-- Row end -->
    
    					</div>
    
    					<div class="invoice-footer">
    						Thank you for the Donation. Please do encourage your friends and family to donate for this great cause.
    					</div>
    
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
</body>
</html>