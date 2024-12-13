@extends('layouts.admin.adminLayout')
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Add Salary/Expense</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Salary/Expense</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Add Salary/Expense</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Add Salary/Expense</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('expense.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Purpose</label>
                                        <input id="purpose" name="purpose" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Amount</label>
                                        <input id="amount" name="amount" type="number" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Pay Method</label>
                                        <select id="method" name="method" class="form-control" required>
                                            <option value="">Select method</option>
                                            <option value="cash">Cash</option>
                                            <option value="cheque">Cheque</option>
                                            <option value="online">Online</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group mb-4">
                                        <label class="form-label"> Date</label>
                                        <input id="date" name="date" name="datepicker" class="datepicker-default form-control" id="datepicker" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Payment Type</label>
                                        <select id="pType" name="pType" class="form-control" required>
                                            <option value="Payment Type">Payment Type</option>
                                            <option value="Annual">Cash</option>
                                            <option value="Exam">Cheque</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Paid By</label>
                                        <textarea name="paidBy" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <button id="generate" class="btn btn-success">Submit</button>
                                    {{-- <button   class="btn btn-info">Invoice Generate</button> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    document.getElementById("generate").addEventListener("click", function() {
        const roll = document.getElementById('roll').value;
        const name = document.getElementById('name').value;
        const course = document.getElementById('course').value;
        const fType = document.getElementById('fType').value;
        const amount = document.getElementById('amount').value;
        const date = document.getElementById('date').value;
        const pType = document.getElementById('pType').value;
        const status = document.getElementById('status').value;
        console.log(roll);
        var contentToPrint = `
        
        <div class="card mt-3" id="content-to-print">
            <h1>Invoice</h1>
                  <div class='invoice-container'>
                    <div class="invoice-content">
                    <h2>From</h2>
                    <b><h3>Omuk Coacing Center</h3>
                        <h4>Email: omuk@gmail.com</h4>
                        <h4>Phone: 01876423</h4></b>
                   </div>
                   <div class="invoice-content">
                    <h2>To</h2>
                    <b>
                        <h2>Name: ${name}</h2>
                        <h5>Course : ${course}</h5>
                    </b>
                   </div>
                    </div>
                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="center">Roll No</th>
                                        <th>Fees Type</th>
                                        <th>Payment Type</th>
                                        <th class="right">Date</th>
                                        <th class="right">Status</th>
                                        <th class="right">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <td class="center">${roll}</td>
                                        <td class="left strong">${fType}</td>
                                        <td class="left">${pType}</td>
                                        <td class="right">${date}</td>
                                        <td class="right">${status}</td>
                                        <td class="right">${amount} ৳</td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                        </div>
                     <div class="row">
                            <div class="col-lg-4 col-sm-5"> </div>
                            <div class="col-lg-4 col-sm-5 ml-auto">
                                <table class="table table-clear">
                                    <tbody>
                                        <tr>
                                            <td class="left"><strong>Total</strong></td>
                                            <td class="right"><strong>${amount} ৳</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> 
                    </div> 
                    <br><br><br>
                    <div>
                        <span>...........</span> <br>
                        <b>Signature</b> <br>
                        </div>
        
        
        
        
        `


        var printWindow = window.open("", "_blank");

        printWindow.document.open();
        printWindow.document.write('<html><head><title>Print</title>');
        printWindow.document.write('</head><body>');
        printWindow.document.write(contentToPrint);
        printWindow.document.write('</body></html>');

        // Include your CSS stylesheet to maintain styling
        printWindow.document.write(`<style>
            .invoice-content{
                border:2px solid #F1F5E8;
                padding:20px;
                margin-bottom:50px;
                border-radius:10px;
            }
            #table-responsive-sm{
                margin-top:30px;
            }
            h1{
                text-align:center;
            }
            .invoice-content{
        padding: 20px;
        text-align: left;
    }
    .invoice-content h1{
        font-size: 35px;
        font-weight: 900;
        margin-bottom: 10px;
    }
    td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
.invoice-container{
    display:flex;
    justify-content:space-between;
}
</style>`);

        printWindow.document.close();

        // Delay the print function to allow styles to load
        printWindow.setTimeout(function() {
            printWindow.print();
            printWindow.close();
        }, 500); // Adjust the delay time if needed
    });
</script>

@endsection