              <div id="editor-xs" class="visible-xs">
              <p>Der Editor ist auf Smartphones leider nicht verfügbar!</p>
              </div>
              
              <div class="hidden-xs">
              
              <?php
              if(isset($_SESSION['u_id'])){
              ?>
              
              <div class="container">
              <div class="row">
                        <div class="col-lg-3">
                            <h1 id="editor"> Bahneditor&nbsp; <i class="fa fa-cubes" aria-hidden="true"></i></h1>
                        </div>
                        <div class="col-lg-3">
                            <div class="dropdown">
                                <button id="dropBahn" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Bahntyp&nbsp;
                                <i class="fa fa-plus-square" aria-hidden="true"></i></button>
                                <ul class="dropdown-menu">
                                    <a href="javascript:bahn(1)"><li>Bahn 1</li></a>
                                    <a href="javascript:bahn(2)"><li>Bahn 2</li></a>
                                    <a href="javascript:bahn(3)"><li>Bahn 3</li></a>
                                    <a href="javascript:bahn(4)"><li>Bahn 4</li></a>
                                    <a href="javascript:bahn(5)"><li>Bahn 5</li></a>
                                    <a href="javascript:bahn(6)"><li>Bahn 6</li></a>
                                    <a href="javascript:bahn(7)"><li>Bahn 7</li></a>
                                    <a href="javascript:bahn(8)"><li>Bahn 8</li></a>
                                    <a href="javascript:bahn(9)"><li>Bahn 9</li></a>
                                    <a href="javascript:bahn(10)"><li>Bahn 10</li></a>
                                    <a href="javascript:bahn(11)"><li>Bahn 11</li></a>
                                    <a href="javascript:bahn(12)"><li>Bahn 12</li></a>
                                    <a href="javascript:bahn(13)"><li>Bahn 13</li></a>
                                    <a href="javascript:bahn(14)"><li>Bahn 14</li></a>
                                    <a href="javascript:bahn(15)"><li>Bahn 15</li></a>
                                    <a href="javascript:bahn(16)"><li>Bahn 16</li></a>
                                    <a href="javascript:bahn(17)"><li>Bahn 17</li></a>
                                    <a href="javascript:bahn(18)"><li>Bahn 18</li></a>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                             <h2 id="bahn-title"></h2>
                        </div>
                    </div>

                    <canvas id='canvas'>
                    Sorry, your browser does not support the canvas tag.
                    </canvas>

                    <div class="col-lg-2 col-lg-push-1">
					    <button id="clearCanvas" class="btn btn-default">Zurücksetzen</button>
					</div>

					<div class="col-lg-2 col-lg-push-1">
                        <button id="export" class="btn btn-default">Speichern</button>
                    </div>

                    <form method="post" accept-charset="utf-8" name="form1">
                        <input name="hidden_data" id='hidden_data' type="hidden"/>
                        <input name="bahn" id='bahn' type="hidden"/>
                    </form>

                    <div class="col-lg-6 col-lg-push-1 col-lg-pull-5">
                        <p> Drücke die "ESC" Taste um das Zeichnen zu beenden.<br>
                        Drücke die &#9003 Taste um die Zeichenfläche zu säubern.</p>
                    </div>

                    <div class="col-lg-12">
                        <hr style="height: 6px;	background: url(http://ibrahimjabbari.com/english/images/hr-12.png) repeat-x 0 0; border: 0;">
                        <h2>Anleitung</h2>
                    </div>

                    <div class="col-lg-6">
                            <h3>Bahnauswahl</h3>
                            <p>Sie können aus dem Dropdown Menü 18 genormte Bahnen wählen und diese in den Editor laden.</p>
                        </div>
                        <div class="col-lg-6">
                            <h3>Zeichnen</h3>
                            <p>Mit der Maus können sie auf die Bahn eine Schlagempfehlung einzeichnen. Drücke die "ESC" Taste um das Zeichnen zu beenden.</p>
                        </div>
                        <div class="col-lg-6">
                            <h3>Speichern</h3>
                            <p>Über den "Speichern" Button wird die Schlagempfehlung zu unserer Gallerie hinzugefügt.</p>
                        </div>
                        <div class="col-lg-6">
                            <h3>Zurücksetzen</h3>
                            <p>Über den "Zurücksetzen" Button kann ihre Zeichnung wieder rückgängig gemacht werden. Drücke die &#9003 Taste um die Zeichenfläche zu säubern.</p>
                        </div>
                        <div class="col-lg-12">
                            <h4 style="text-align: center">Eine genauere Beschreiben der Funktionen finden Sie auf der <a href=index.php?page=function>Funktionsseite!</a></h4>
                        </div>
                    </div>
            </div>
            </div>
            
            <?php
              } else{
                  ?>
                      <div id="bannertwo"></div>
                  <div class="content-blur">
                      
                              <h2>Registriere oder logge dich ein um den Editor nutzen zu können!</h2>
                          
                          <div class="col-lg-push-5 col-lg-2">
                              <button  id="editor-login" class="button big" data-toggle="modal" data-target="#myModal">
                                  <span class="glyphicon glyphicon-log-in"></span> Login
                              </button>
                          </div>
                          </div>
                          
                          
                    
                  <?php
              }
            ?>
            </div>
