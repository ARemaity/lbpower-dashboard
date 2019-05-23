





<?php
include("DBConnect.php");
// Create connection

// Check connection



/*if ( isset($_POST['id'])) {

    $id=$_POST['id'];

    $query = "SELECT  `consumption` ,`costof1`,`Total`,`payment_st`, `issued_date`, `payment_date` FROM `payment` WHERE   id=".$id;
    
    $result= mysqli_query($connect,$query);
    
    
        $row=mysqli_fetch_assoc($result);
        $data["consumption"] = $row["consumption"];
        $data["costof1"] = $row["costof1"];
        $data["Total"] = $row["Total"];
        $data["payment_st"] = $row["payment_st"];
        $data["issued_date"] = $row["issued_date"];
        if($row["payment_st"]=="0"){
            
            $data["payment_date"] = "0";*/

echo "hi";
if (isset($_POST['id'])) {
    echo "<div class='modal fade' id='paymodal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='exampleModalLabel'>Ready to Leave?</h5>
          <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>×</span>
          </button>
        </div>
        <div class='modal-body'>
          <div class='container'>
            <div class='card'>
              <div class='card-header'>
                Invoice
                <strong>01/01/01/2018</strong>
                <span class='float-right'> <strong>Status:</strong> Pending</span>

              </div>
              <div class='card-body'>
                <div class='row mb-4'>
                  <div class='col-sm-6'>
                    <h6 class='mb-3'>From:</h6>
                    <div>
                      <strong>Webz Poland</strong>
                    </div>
                    <div>Madalinskiego 8</div>
                    <div>71-101 Szczecin, Poland</div>
                    <div>Email: info@webz.com.pl</div>
                    <div>Phone: +48 444 666 3333</div>
                  </div>

                  <div class='col-sm-6'>
                    <h6 class='mb-3'>To:</h6>
                    <div>
                      <strong>Bob Mart</strong>
                    </div>
                    <div>Attn: Daniel Marek</div>
                    <div>43-190 Mikolow, Poland</div>
                    <div>Email: marek@daniel.com</div>
                    <div>Phone: +48 123 456 789</div>
                  </div>



                </div>

                <div class='table-responsive-sm'>
                  <table class='table table-striped'>
                    <thead>
                      <tr>

                        <th>name</th>


                        <th class='right'>Unit Cost</th>
                        <th class='center'>Qty</th>
                        <th class='right'>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>

                        <td class='left strong'>Origin License</td>


                        <td class='right'>$999,00</td>
                        <td class='center'>1</td>
                        <td class='right'>$999,00</td>
                      </tr>

                    </tbody>
                  </table>
                </div>
                <div class='row'>
                  <div class='col-lg-4 col-sm-5'>

                  </div>

                  <div class='col-lg-4 col-sm-5 ml-auto'>
                    <table class='table table-clear'>
                      <tbody>
                        <tr>
                          <td class='left'>
                            <strong>Subtotal</strong>
                          </td>
                          <td class='right'>$8.497,00</td>
                        </tr>
                        <tr>
                          <td class='left'>
                            <strong>Discount (20%)</strong>
                          </td>
                          <td class='right'>$1,699,40</td>
                        </tr>
                        <tr>
                          <td class='left'>
                            <strong>VAT (10%)</strong>
                          </td>
                          <td class='right'>$679,76</td>
                        </tr>
                        <tr>
                          <td class='left'>
                            <strong>Total</strong>
                          </td>
                          <td class='right'>
                            <strong>$7.477,36</strong>
                          </td>
                        </tr>
                      </tbody>
                    </table>

                  </div>

                </div>

              </div>
            </div>
          </div>
        </div>
        <div class='modal-footer'>
          <button class='btn btn-secondary' type='button' data-dismiss='modal'>Cancel</button>
          <a class='btn btn-primary' href='login.html'>Logout</a>
        </div>
      </div>
    </div>
  </div>";
} else {





    echo "no";
}


/*  }else{
            $data["payment_date"] = $row["payment_date"];
        
            echo "
            
            <div class= 'modal fade ' id='pay ' tabindex= '-1 ' role= 'dialog ' aria-labelledby= 'exampleModalLabel ' aria-hidden= 'true '>
            <div class= 'modal-dialog  modal-lg ' role= 'document '>
              <div class= 'modal-content '>
                <div class= 'modal-header '>
                  <h5 class= 'modal-title ' id= 'exampleModalLabel '>Payment is </h5>
                  <button class= 'close ' type= 'button ' data-dismiss= 'modal ' aria-label= 'Close '>
                    <span aria-hidden= 'true '>×</span>
                  </button>
                </div>
                <div class= 'modal-body '>
                  <div class= 'container '>
                    <div class= 'card '>
                      <div class= 'card-header '>
                        Invoice
                        <strong>01/01/01/2018</strong>
                        <span class= 'float-right '> <strong>The id is.".$_POST['id']."</strong> Pending</span>
    
                      </div>
                      <div class= 'card-body '>
                        <div class= 'row mb-4 '>
                          <div class= 'col-sm-6 '>
                            <h6 class= 'mb-3 '>From:</h6>
                            <div>
                              <strong>Webz Poland</strong>
                            </div>
                            <div>Madalinskiego 8</div>
                            <div>71-101 Szczecin, Poland</div>
                            <div>Email: info@webz.com.pl</div>
                            <div>Phone: +48 444 666 3333</div>
                          </div>
    
                          <div class= 'col-sm-6 '>
                            <h6 class= 'mb-3 '>To:</h6>
                            <div>
                              <strong>Bob Mart</strong>
                            </div>
                            <div>Attn: Daniel Marek</div>
                            <div>43-190 Mikolow, Poland</div>
                            <div>Email: marek@daniel.com</div>
                            <div>Phone: +48 123 456 789</div>
                          </div>
    
    
    
                        </div>
    
                        <div class= 'table-responsive-sm '>
                          <table class= 'table table-striped '>
                            <thead>
                              <tr>
    
                                <th>Name</th>
    
    
                                <th class= 'right '>Unit Cost</th>
                                <th class= 'center '>Qty</th>
                                <th class= 'right '>Total</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class= 'left strong '>Origin License</td>
    
    
                                <td class= 'right '>$999,00</td>
                                <td class= 'center '>1</td>
                                <td class= 'right '>$999,00</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class= 'row '>
                          <div class= 'col-lg-4 col-sm-5 '>
    
                          </div>
    
                          <div class= 'col-lg-4 col-sm-5 ml-auto '>
                            <table class= 'table table-clear '>
                              <tbody>
                                <tr>
                                  <td class= 'left '>
                                    <strong>Subtotal</strong>
                                  </td>
                                  <td class= 'right '>$8.497,00</td>
                                </tr>
                                <tr>
                                  <td class= 'left '>
                                    <strong>Discount (20%)</strong>
                                  </td>
                                  <td class= 'right '>$1,699,40</td>
                                </tr>
                                <tr>
                                  <td class= 'left '>
                                    <strong>VAT (10%)</strong>
                                  </td>
                                  <td class= 'right '>$679,76</td>
                                </tr>
                                <tr>
                                  <td class= 'left '>
                                    <strong>Total</strong>
                                  </td>
                                  <td class= 'right '>
                                    <strong>$7.477,36</strong>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
    
                          </div>
    
                        </div>
    
                      </div>
                    </div>
                  </div>
                </div>
                <div class= 'modal-footer '>
                  <button class= 'btn btn-secondary ' type= 'button ' data-dismiss= 'modal '>Cancel</button>
                  <a class= 'btn btn-primary ' href= 'login.html '>Logout</a>
                </div>
              </div>
            </div>
          </div>";
        
        
        }
            
      
        
    }  
    
}*/



?>








