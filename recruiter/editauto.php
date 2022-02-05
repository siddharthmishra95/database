<?php
include('../shared/header.php')
?>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php include('../shared/topbar.php') ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <?php include('../shared/sidebar.php') ?>
      <script>
      function checkemailAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
          url: "check_availability.php",
          data: 'emailid=' + $("#emailid").val(),
          type: "POST",
          success: function(data) {
            $("#email-availability-status").html(data);
            $("#loaderIcon").hide();
          },
          error: function() {}
        });
      }
      </script>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Edit Candidate</button>
            <button class="tablinks" onclick="openCity(event, 'Paris')">Add Duplicate Candidate</button>
            <button class="tablinks" onclick="openCity(event, 'Tokyo')">Add Renaiming Candidate</button>
          </div>

          <div id="London" class="tabcontent">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <form class="form-sample" action="editauto.php" method="post" enctype="multipart/form-data">
                    <p class="card-description"> Candidate info </p>
                    <div class="row" style="display:none">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">DAT</label>
                          <div class="col-sm-8">
                            <input name="dat" value="<?php date_default_timezone_set('Asia/Kolkata');
                                $currentDateTime = date('d-M-Y H:i:s a');
                                echo $currentDateTime; ?>" readonly="readonly" class="form-group form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">DATA</label>
                          <div class="col-sm-8">
                            <input name="data" value="<?php date_default_timezone_set('Asia/Kolkata');
                                $currentDateTime = date('d-M-Y');
                                echo $currentDateTime; ?>" readonly="readonly" class="form-group form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Employee Code</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="uploaded"
                              value="<?php echo $_SESSION['empid'] ?>" required="" readonly="readonly">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Client Name</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="clientname" value="<?= $clientname;  ?>" required="">
                              <option value="">Select Client</option>
                              <option value="Automobile" <?php  
                            if($row['clientname']=='Automobile'){
                                echo "selected";
                            }
                            ?>>Automobile</option>
                              <option value="Advik Hi-Tech" <?php  
                            if($row['clientname']=='Advik Hi-Tech'){
                                echo "selected";
                            }
                            ?>>Advik Hi-Tech</option>
                              <option value="Apollo Tyres" <?php  
                            if($row['clientname']=='Apollo Tyres'){
                                echo "selected";
                            }
                            ?>>Apollo Tyres</option>
                              <option value="Acti- Mitsui" <?php  
                            if($row['clientname']=='Acti- Mitsui'){
                                echo "selected";
                            }
                            ?>>Acti- Mitsui</option>
                              <option value="Asti Electronics" <?php  
                            if($row['clientname']=='Asti Electronics'){
                                echo "selected";
                            }
                            ?>>Asti Electronics</option>
                              <option value="AVL India" <?php  
                            if($row['clientname']=='Avl India'){
                                echo "selected";
                            }
                            ?>>AVL India</option>
                              <option value="Aisin Auto" <?php  
                            if($row['clientname']=='Aisin Auto'){
                                echo "selected";
                            }
                            ?>>Aisin Auto</option>
                              <option value="BNPA" <?php  
                            if($row['clientname']=='BNPA'){
                                echo "selected";
                            }
                            ?>>BNPA</option>
                              <option value="Cavendish" <?php  
                            if($row['clientname']=='Cavendish'){
                                echo "selected";
                            }
                            ?>>Cavendish</option>
                              <option value="Colorobbia" <?php  
                            if($row['clientname']=='Colorobbia'){
                                echo "selected";
                            }
                            ?>>Colorobbia</option>
                              <option value="Contitech India" <?php  
                            if($row['clientname']=='Contitech India'){
                                echo "selected";
                            }
                            ?>>Contitech India</option>
                              <option value="Daikin Air- Conditioning" <?php  
                            if($row['clientname']=='Diakin Air- Conditioning'){
                                echo "selected";
                            }
                            ?>>Daikin Air- Conditioning</option>
                              <option value="Denso India" <?php  
                            if($row['clientname']=='Denso India'){
                                echo "selected";
                            }
                            ?>>Denso India</option>
                              <option value="Denso International" <?php  
                            if($row['clientname']=='Denso International'){
                                echo "selected";
                            }
                            ?>>Denso International</option>
                              <option value="Denso Subros" <?php  
                            if($row['clientname']=='Denso Subros'){
                                echo "selected";
                            }
                            ?>>Denso Subros</option>
                              <option value="Escorts" <?php  
                            if($row['clientname']=='Escorts'){
                                echo "selected";
                            }
                            ?>>Escorts</option>
                              <option value="FCC India" <?php  
                            if($row['clientname']=='FCC India'){
                                echo "selected";
                            }
                            ?>>FCC India</option>
                              <option value="GPP" <?php  
                            if($row['clientname']=='GPP'){
                                echo "selected";
                            }
                            ?>>GPP</option>
                              <option value="Goshi India" <?php  
                            if($row['clientname']=='Goshi India'){
                                echo "selected";
                            }
                            ?>>Goshi India</option>
                              <option value="Hanon Climate" <?php  
                            if($row['clientname']=='Hanon Climate'){
                                echo "selected";
                            }
                            ?>>Hanon Climate </option>
                              <option value="HIM Technoforge" <?php  
                            if($row['clientname']=='HIM Technoforge'){
                                echo "selected";
                            }
                            ?>>HIM Technoforge</option>
                              <option value="Hollister" <?php  
                            if($row['clientname']=='Hollister'){
                                echo "selected";
                            }
                            ?>>Hollister</option>
                              <option value="Honda Cars" <?php  
                            if($row['clientname']=='Honda Cars'){
                                echo "selected";
                            }
                            ?>>Honda Cars</option>
                              <option value="KEI Industries" <?php  
                            if($row['clientname']=='KEI Industries'){
                                echo "selected";
                            }
                            ?>>KEI Industries</option>
                              <option value="KIA Motors" <?php  
                            if($row['clientname']=='KIA Motors'){
                                echo "selected";
                            }
                            ?>>KIA Motors</option>
                              <option value="JK Tyre" <?php  
                            if($row['clientname']=='JK Tyre'){
                                echo "selected";
                            }
                            ?>>JK Tyre</option>
                              <option value="JK Papers(Delopt)" <?php  
                            if($row['clientname']=='JK Papers(Delopt)'){
                                echo "selected";
                            }
                            ?>>JK Papers(Delopt)</option>
                              <option value="JK Food" <?php  
                            if($row['clientname']=='JK Food'){
                                echo "selected";
                            }
                            ?>>JK Food</option>
                              <option value="JNS Instrument" <?php  
                            if($row['clientname']=='JNS Instrument'){
                                echo "selected";
                            }
                            ?>>JNS Instrument</option>
                              <option value="Jtekt Fujikiko India" <?php  
                            if($row['clientname']=='Jtekt Fujikiko India'){
                                echo "selected";
                            }
                            ?>>Jtekt Fujikiko India</option>
                              <option value="Jtekt India" <?php  
                            if($row['clientname']=='Jtekt India'){
                                echo "selected";
                            }
                            ?>>Jtekt India</option>
                              <option value="Jyotech Engg" <?php  
                            if($row['clientname']=='Jyotech Engg'){
                                echo "selected";
                            }
                            ?>>Jyotech Engg</option>
                              <option value="Lotte Chemical" <?php  
                            if($row['clientname']=='Lotte Chemical'){
                                echo "selected";
                            }
                            ?>>Lotte Chemical</option>
                              <option value="LS Cable India" <?php  
                            if($row['clientname']=='LS Cable India'){
                                echo "selected";
                            }
                            ?>>LS Cable India</option>
                              <option value="Magna Rico Powertrain" <?php  
                            if($row['clientname']=='Magna Rico Powertrain'){
                                echo "selected";
                            }
                            ?>>Magna Rico Powertrain</option>
                              <option value="Magneti Marelli CK Holdings" <?php  
                            if($row['clientname']=='Magneti Marelli CK Holdings'){
                                echo "selected";
                            }
                            ?>>Magneti Marelli CK Holdings</option>
                              <option value="Maruti Suzuki" <?php  
                            if($row['clientname']=='Maruti Suzuki'){
                                echo "selected";
                            }
                            ?>>Maruti Suzuki</option>
                              <option value="Munjal Kiriu" <?php  
                            if($row['clientname']=='Munjal Kiriu'){
                                echo "selected";
                            }
                            ?>>Munjal Kiriu</option>
                              <option value="Mando" <?php  
                            if($row['clientname']=='Mando'){
                                echo "selected";
                            }
                            ?>>Mando</option>
                              <option value="Nachi KG" <?php  
                            if($row['clientname']=='Nachi KG'){
                                echo "selected";
                            }
                            ?>>Nachi KG</option>
                              <option value="Napino Electronics" <?php  
                            if($row['clientname']=='Napino Electronics'){
                                echo "selected";
                            }
                            ?>>Napino Electronics</option>
                              <option value="Neemrana Steel" <?php  
                            if($row['clientname']=='Neemrana Steel'){
                                echo "selected";
                            }
                            ?>>Neemrana Steel</option>
                              <option value="NGK" <?php  
                            if($row['clientname']=='NGK'){
                                echo "selected";
                            }
                            ?>>NGK</option>
                              <option value="Nippon Steel" <?php  
                            if($row['clientname']=='Nippon Steel'){
                                echo "selected";
                            }
                            ?>>Nippon Steel</option>
                              <option value="Nissin Brake" <?php  
                            if($row['clientname']=='Nissin Brake'){
                                echo "selected";
                            }
                            ?>>Nissin Brake</option>
                              <option value="Nippon Konpo" <?php  
                            if($row['clientname']=='Nippon Konpo'){
                                echo "selected";
                            }
                            ?>>Nippon Konpo</option>
                              <option value="Nitto Denko" <?php  
                            if($row['clientname']=='Nitto Denko'){
                                echo "selected";
                            }
                            ?>>Nitto Denko</option>
                              <option value="Padmini VNA" <?php  
                            if($row['clientname']=='Padmini VNA'){
                                echo "selected";
                            }
                            ?>>Padmini VNA</option>
                              <option value="Pharmaceutical Company" <?php  
                            if($row['clientname']=='Pharmaceutical Company'){
                                echo "selected";
                            }
                            ?>>Pharmaceutical Company</option>
                              <option value="Rockman Industries" <?php  
                            if($row['clientname']=='Rockman Industries'){
                                echo "selected";
                            }
                            ?>>Rockman Industries</option>
                              <option value="Rico Auto" <?php  
                            if($row['clientname']=='Rico Auto'){
                                echo "selected";
                            }
                            ?>>Rico Auto</option>
                              <option value="Rico Jinfie" <?php  
                            if($row['clientname']=='Rico Jinfie'){
                                echo "selected";
                            }
                            ?>>Rico Jinfie</option>
                              <option value="Roto Pumps" <?php  
                            if($row['clientname']=='Roto Pumps'){
                                echo "selected";
                            }
                            ?>>Roto Pumps</option>
                              <option value="Sany Heavy Industries" <?php  
                            if($row['clientname']=='Sany Heavy Industies'){
                                echo "selected";
                            }
                            ?>>Sany Heavy Industries</option>
                              <option value="Sekisui DLJM" <?php  
                            if($row['clientname']=='Sekisui DLJM'){
                                echo "selected";
                            }
                            ?>>Sekisui DLJM</option>
                              <option value="Sintex BAPL" <?php  
                            if($row['clientname']=='Sintex BAPL'){
                                echo "selected";
                            }
                            ?>>Sintex BAPL</option>
                              <option value="SKH Magneti Marelli" <?php  
                            if($row['clientname']=='SKH Magneti Marelli'){
                                echo "selected";
                            }
                            ?>>SKH Magneti Marelli</option>
                              <option value="Sona Comstar" <?php  
                            if($row['clientname']=='Sona Comstar'){
                                echo "selected";
                            }
                            ?>>Sona Comstar</option>
                              <option value="SRF Ltd." <?php  
                            if($row['clientname']=='SRF Ltd.'){
                                echo "selected";
                            }
                            ?>>SRF Ltd.</option>
                              <option value="Sterling  E-Mobility" <?php  
                            if($row['clientname']=='Sterling E-Mobility'){
                                echo "selected";
                            }
                            ?>>Sterling E-Mobility</option>
                              <option value="Subros Airconditioning" <?php  
                            if($row['clientname']=='Subros Airconditioning'){
                                echo "selected";
                            }
                            ?>>Subros Airconditioning</option>
                              <option value="Supreme " <?php  
                            if($row['clientname']=='Supreme'){
                                echo "selected";
                            }
                            ?>>Supreme </option>
                              <option value="Suzuki Motorcycle" <?php  
                            if($row['clientname']=='Suzuki Motorcycle'){
                                echo "selected";
                            }
                            ?>>Suzuki Motorcycle</option>
                              <option value="Suzuki Motors" <?php  
                            if($row['clientname']=='Suzuki Motors'){
                                echo "selected";
                            }
                            ?>>Suzuki Motors</option>
                              <option value="Sanoh India" <?php  
                            if($row['clientname']=='Sanoh India'){
                                echo "selected";
                            }
                            ?>>Sanoh India</option>
                              <option value="TAFE" <?php  
                            if($row['clientname']=='TAFE'){
                                echo "selected";
                            }
                            ?>>TAFE</option>
                              <option value="Talbros Marugo" <?php  
                            if($row['clientname']=='Talbros Marugo'){
                                echo "selected";
                            }
                            ?>>Talbros Marugo</option>
                              <option value="TII India" <?php  
                            if($row['clientname']=='TII India'){
                                echo "selected";
                            }
                            ?>>TII India</option>
                              <option value="Tokai Rubber" <?php  
                            if($row['clientname']=='Tokai Rubber'){
                                echo "selected";
                            }
                            ?>>Tokai Rubber</option>
                              <option value="TPR" <?php  
                            if($row['clientname']=='TPR'){
                                echo "selected";
                            }
                            ?>>TPR</option>
                              <option value="Usha International" <?php  
                            if($row['clientname']=='Usha International'){
                                echo "selected";
                            }
                            ?>>Usha International</option>
                              <option value="Vardhman Textiles" <?php  
                            if($row['clientname']=='Vardhman Textiles'){
                                echo "selected";
                            }
                            ?>>Vardhman Textiles</option>
                              <option value="Volvo" <?php  
                            if($row['clientname']=='Volvo'){
                                echo "selected";
                            }
                            ?>>Volvo</option>
                              <option value="Yachiyo" <?php  
                            if($row['clientname']=='Yachiyo'){
                                echo "selected";
                            }
                            ?>>Yachiyo</option>
                              <option value="Yutaka Autoparts" <?php  
                            if($row['clientname']=='Yutaka Autoparts'){
                                echo "selected";
                            }
                            ?>>Yutaka Autoparts</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Working Department</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="workingdept" value="<?= $workingdept;  ?>"
                              required="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <input type="hidden" name="id" value="<?= $id; ?>">
                          <label class="col-sm-4 col-form-label">Candidate Name</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" value="<?= $name;  ?>" required="">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Candidate Company Name</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="companyname" value="<?= $companyname;  ?>"
                              required="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Designation</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="designation" value="<?= $designation;  ?>"
                              required="">
                          </div>

                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Highest Qualification</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="qualification" value="<?= $qualification;  ?>"
                              required="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Experience</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="experience" value="<?= $experience;  ?>"
                              required="">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Current Salary</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="currentsal" value="<?= $currentsal;  ?>"
                              required="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Expected Salary</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="expectedsal" value="<?= $expectedsal;  ?>"
                              required="">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Notice Period</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="noticeperiod" value="<?= $noticeperiod;  ?>"
                              required="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Current Location</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="address" value="<?= $address;  ?>"
                              required="">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Permanent Location</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="peraddress" value="<?= $peraddress;  ?>"
                              required="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Mobile</label>
                          <div class="col-sm-8">
                            <input type="tel" class="form-control" name="phone" value="<?= $phone;  ?>" required="">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Email</label>
                          <div class="col-sm-8">
                            <input type="email" class="form-control" id="emailid" onBlur="checkemailAvailability()"
                              name="email" value="<?= $email;  ?>" required="">
                            <tr>
                              <th width="24%" scope="row"></th>
                              <td> <span id="email-availability-status"></span> </td>
                            </tr>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Shortlisting Status</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="short" value="<?= $short;  ?>">
                              <option value="">Shortlisting Status</option>
                              <option value="Shortlisted for Zoom/MS Teams/WebEx" <?php  
                            if($row['short']=='Shortlisted for Zoom/MS Teams/WebEx'){
                                echo "selected";
                            }
                            ?>>Shortlisted for Zoom/MS Teams/WebEx</option>
                              <option value="Shortlisted for Telecom" <?php  
                            if($row['short']=='Shortlisted for Telecom'){
                                echo "selected";
                            }
                            ?>>Shortlisted for Telecom</option>
                              <option value="Shortlisted for F2F" <?php  
                            if($row['short']=='Shortlisted for F2F'){
                                echo "selected";
                            }
                            ?>>Shortlisted for F2F</option>
                              <option value="Rejected" <?php  
                            if($row['short']=='Rejected'){
                                echo "selected";
                            }
                            ?>>Rejected</option>
                              <option value="Hold" <?php  
                            if($row['short']=='Hold'){
                                echo "selected";
                            }
                            ?>>Hold</option>
                              <option value="Pending" <?php  
                            if($row['short']=='Pending'){
                                echo "selected";
                            }
                            ?>>Pending</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Reason For Rejection</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="ror" value="<?= $ror;  ?>">
                          </div>
                        </div>
                      </div>
                      <!--<div class="form-group">
                          <input type="text" name="doi" value="<?= $doi;  ?>" class="form-control" placeholder="Date of Interview Telecom/Video Round">
                        </div>
                        <div class="form-group">
                          <select class="form-control btn btn-secondary btn-block" name="shortfirst" value="<?= $shortfirst;  ?>" >
                            <option value="">Telecom/Video Status</option>
                            <option value="Shortlisted"<?php  
                            if($row['shortfirst']=='Shortlisted'){
                              echo "selected";
                          }
                          ?>>Shortlisted</option>
                          <option value="Rejected"<?php  
                          if($row['shortfirst']=='Rejected'){
                              echo "selected";
                          }
                          ?>>Rejected</option>
                            <option value="Hold"<?php  
                          if($row['shortfirst']=='Hold'){
                              echo "selected";
                          }
                          ?>>Hold</option>
                            <option value="Pending"<?php  
                          if($row['shortfirst']=='Pending'){
                              echo "selected";
                          }
                          ?>>Pending</option>
                              </select>
                      </div>-->
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Date of Interview First Round</label>
                          <div class="col-sm-8">
                            <input type="date" class="form-control" name="dof" value="<?= $dof;  ?>">
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Status for First Round</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="shortfinal" value="<?= $shortfinal;  ?>">
                              <option value="">Status for First Round</option>
                              <option value="Shortlisted" <?php  
                            if($row['shortfinal']=='Shortlisted'){
                                echo "selected";
                            }
                            ?>>Shortlisted</option>
                              <option value="Rejected" <?php  
                            if($row['shortfinal']=='Rejected'){
                                echo "selected";
                            }
                            ?>>Rejected</option>
                              <option value="Hold" <?php  
                            if($row['shortfinal']=='Hold'){
                                echo "selected";
                            }
                            ?>>Hold</option>
                              <option value="Pending" <?php  
                            if($row['shortfinal']=='Pending'){
                                echo "selected";
                            }
                            ?>>Pending</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Date of Interview Final Round</label>
                          <div class="col-sm-8">
                            <input type="date" class="form-control" name="dos" value="<?= $dos;  ?>">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Selected</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="selected" value="<?= $selected;  ?>">
                              <option value="">Selected</option>
                              <option value="Yes" <?php  
                            if($row['selected']=='Yes'){
                                echo "selected";
                            }
                            ?>>Yes</option>
                              <option value="No" <?php  
                            if($row['selected']=='No'){
                                echo "selected";
                            }
                            ?>>No</option>
                              <option value="Hold" <?php  
                            if($row['selected']=='Hold'){
                                echo "selected";
                            }
                            ?>>Hold</option>
                              <option value="Pending" <?php  
                            if($row['selected']=='Pending'){
                                echo "selected";
                            }
                            ?>>Pending</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Joined</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="joined" value="<?= $joined;  ?>">
                              <option value="">Joined</option>
                              <option value="Joined" <?php  
                            if($row['joined']=='Joined'){
                                echo "selected";
                            }
                            ?>>Joined</option>
                              <option value="NJ" <?php  
                            if($row['joined']=='Not Joined'){
                                echo "selected";
                            }
                            ?>>Not Joined</option>
                              <option value="YTJ" <?php  
                            if($row['joined']=='Yet to Joined'){
                                echo "selected";
                            }
                            ?>>Yet to Joined</option>
                              <option value="Left" <?php  
                            if($row['joined']=='Left'){
                                echo "selected";
                            }
                            ?>>Left</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">SELECT STATUS</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="status" value="<?= $status;  ?>" required="">
                              <option value="">SELECT STATUS</option>
                              <option value="OK" <?php  
                            if($row['status']=='OK'){
                                echo "selected";
                            }
                            ?>>OK</option>
                              <option value="CALL AGAIN" <?php  
                            if($row['status']=='CALL AGAIN'){
                                echo "selected";
                            }
                            ?>>CALL AGAIN</option>
                              <option value="NOT INTERESTED" <?php  
                            if($row['status']=='NOT INTERESTED'){
                                echo "selected";
                            }
                            ?>>Not Interested</option>
                              <option value="MISMATCH" <?php  
                            if($row['status']=='MISMATCH'){
                                echo "selected";
                            }
                            ?>>MISMATCH</option>
                              <option value="BYMAIL" <?php  
                            if($row['status']=='BYMAIL'){
                                echo "selected";
                            }
                            ?>>BYMAIL</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Joined</label>
                          <div class="col-sm-8">
                            <input type="text" name="remarks" value="<?= $remarks;  ?>" class="form-control"
                              placeholder="Enter Remarks">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">SELECT CANDIDATE DEPARTMENT</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="department" value="<?= $department;  ?>" required="">
                              <option value="">SELECT CANDIDATE DEPARTMENT</option>
                              <option value="FRESHER" <?php  
                            if($row['department']=='FRESHER'){
                                echo "selected";
                            }
                            ?>>Fresher</option>
                              <option value="PROD" <?php  
                            if($row['department']=='PROD'){
                                echo "selected";
                            }
                            ?>>Production</option>
                              <option value="QA" <?php  
                            if($row['department']=='QA'){
                                echo "selected";
                            }
                            ?>>Quality Assurance</option>
                              <option value="SQA" <?php  
                            if($row['department']=='SQA'){
                                echo "selected";
                            }
                            ?>>Supplier Quality Assurance</option>
                              <option value="QC" <?php  
                            if($row['department']=='QC'){
                                echo "selected";
                            }
                            ?>>Quality Control</option>
                              <option value="PE" <?php  
                            if($row['department']=='PE'){
                                echo "selected";
                            }
                            ?>>Process, Process Engineering</option>
                              <option value="HEAT TREATMENT" <?php  
                            if($row['department']=='HEAT TREATMENT'){
                                echo "selected";
                            }
                            ?>>HEAT TREATMENT</option>
                              <option value="Metaullurgy" <?php  
                            if($row['department']=='Metaullurgy'){
                                echo "selected";
                            }
                            ?>>Metaullurgy</option>
                              <option value="MKTG" <?php  
                            if($row['department']=='MKTG'){
                                echo "selected";
                            }
                            ?>>Marketing</option>
                              <option value="SALES" <?php  
                            if($row['department']=='SALES'){
                                echo "selected";
                            }
                            ?>>SALES</option>
                              <option value="SCM" <?php  
                            if($row['department']=='SCM'){
                                echo "selected";
                            }
                            ?>>SCM</option>
                              <option value="Design" <?php  
                            if($row['department']=='Design'){
                                echo "selected";
                            }
                            ?>>Design</option>
                              <option value="D&D" <?php  
                            if($row['department']=='D&D'){
                                echo "selected";
                            }
                            ?>>Design & Development</option>
                              <option value="R&D" <?php  
                            if($row['department']=='R&D'){
                                echo "selected";
                            }
                            ?>>Research And Development</option>
                              <option value="NPD" <?php  
                            if($row['department']=='NPD'){
                                echo "selected";
                            }
                            ?>>New Product Development</option>
                              <option value="Testing" <?php  
                            if($row['department']=='Testing'){
                                echo "selected";
                            }
                            ?>>Testing</option>
                              <option value="MFG" <?php  
                            if($row['department']=='MFG'){
                                echo "selected";
                            }
                            ?>>Manufacturing</option>
                              <option value="Interpreter" <?php  
                            if($row['department']=='Interpreter'){
                                echo "selected";
                            }
                            ?>>Interpreter</option>
                              <option value="Civil" <?php  
                            if($row['department']=='Civil'){
                                echo "selected";
                            }
                            ?>>Civil Construction</option>
                              <option value="Maint" <?php  
                            if($row['department']=='Maint'){
                                echo "selected";
                            }
                            ?>>Maintenance</option>
                              <option value="F&A" <?php  
                            if($row['department']=='F&A'){
                                echo "selected";
                            }
                            ?>>Finance & Account</option>
                              <option value="EHS" <?php  
                            if($row['department']=='EHS'){
                                echo "selected";
                            }
                            ?>>Environment Health & Safety</option>
                              <option value="Project" <?php  
                            if($row['department']=='Project'){
                                echo "selected";
                            }
                            ?>>Project</option>
                              <option value="Operation" <?php  
                            if($row['department']=='Operation'){
                                echo "selected";
                            }
                            ?>>Operation</option>
                              <option value="O&M" <?php  
                            if($row['department']=='O&M'){
                                echo "selected";
                            }
                            ?>>Operation & Maintenance</option>
                              <option value="PPC" <?php  
                            if($row['department']=='PPC'){
                                echo "selected";
                            }
                            ?>>Production Planning & Control</option>
                              <option value="HR" <?php  
                            if($row['department']=='HR'){
                                echo "selected";
                            }
                            ?>>Human Resource</option>
                              <option value="Security" <?php  
                            if($row['department']=='Security'){
                                echo "selected";
                            }
                            ?>>Security</option>
                              <option value="IT" <?php  
                            if($row['department']=='IT'){
                                echo "selected";
                            }
                            ?>>IT</option>
                              <option value="Software" <?php  
                            if($row['department']=='Software'){
                                echo "selected";
                            }
                            ?>>Software</option>
                              <option value="CAE" <?php  
                            if($row['department']=='CAE'){
                                echo "selected";
                            }
                            ?>>CAE</option>
                              <option value="Operator" <?php  
                            if($row['department']=='Operator'){
                                echo "selected";
                            }
                            ?>>Operator</option>
                              <option value="Data Operator" <?php  
                            if($row['department']=='Data Operator'){
                                echo "selected";
                            }
                            ?>>Data Operator</option>
                              <option value="Computer Operator" <?php  
                            if($row['department']=='Computer Operator'){
                                echo "selected";
                            }
                            ?>>Computer Operator</option>
                              <option value="Chemist" <?php  
                            if($row['department']=='Chemist'){
                                echo "selected";
                            }
                            ?>>Chemist</option>
                              <option value="INST" <?php  
                            if($row['department']=='INST'){
                                echo "selected";
                            }
                            ?>>Instrument</option>
                              <option value="Tool Room" <?php  
                            if($row['department']=='Tool Room'){
                                echo "selected";
                            }
                            ?>>Tool Room</option>
                              <option value="Draughtsman" <?php  
                            if($row['department']=='Draughtsman'){
                                echo "selected";
                            }
                            ?>>Draughtsman</option>
                              <option value="Service" <?php  
                            if($row['department']=='Service'){
                                echo "selected";
                            }
                            ?>>Service</option>
                              <option value="Legal" <?php  
                            if($row['department']=='Legal'){
                                echo "selected";
                            }
                            ?>>Legal</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">


                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <input type="hidden" name="oldresume" value="<?= $resume ?>">
                      <label class="col-sm-3 col-form-label">File Upload</label>
                      <input type="file" name="resume" value="<?= $resume;  ?>" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>

                    <div class="form-group">
                      <?php if ($update == true) { ?>
                      <input type="submit" name="update" class="btn btn-success btn-block" value="Update Record">
                      <?php } else { ?>
                      <input type="submit" name="add" class="btn btn-primary btn-block" value="Add Record">
                      <?php } ?>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div id="Paris" class="tabcontent">
            <h3>Paris</h3>
            <p>Paris is the capital of France.</p>
          </div>

          <div id="Tokyo" class="tabcontent">
            <h3>Tokyo</h3>
            <p>Tokyo is the capital of Japan.</p>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
            <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright ©
              innovationtriggers.com
              2021</span>
            <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a
                href="https://www.innovationtriggers.com" target="_blank">Bootstrap admin
                template</a> Innovationtriggers.com</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <?php
include('../shared/footer.php')
?>