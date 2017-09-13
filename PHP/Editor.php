<div class="row">
                            <div class="col-lg-3">
                                <h1 id="editor"> Bahneditor&nbsp; <i class="fa fa-train" aria-hidden="true"></i></h1>
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
					    <button id="clearCanvas" class="btn btn-default">Zurücksetzten</button>
					</div>

					<div class="col-lg-2 col-lg-push-1">
                        <button id="export" class="btn btn-default">Upload</button>
                    </div>

                    <form method="post" accept-charset="utf-8" name="form1">
                        <input name="hidden_data" id='hidden_data' type="hidden"/>
                        <input name="bahn" id='bahn' type="hidden"/>
                    </form>
					</div>
                </div>
            </div>