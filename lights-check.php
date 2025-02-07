<link rel="stylesheet" type="text/css" href="esp-style2.css">
                    <?php
                        include_once('esp-database.php');
                    
                        $result = getAllOutputs();
                        $html_buttons = null;
                        if ($result) {
                            while ($row = $result->fetch_assoc()) {
                                if ($row["state"] == "1"){
                                    $button_checked = "checked";
                                }
                                else {
                                    $button_checked = "";
                                }
                                $html_buttons .= '<h5 style="text-align: left;height: 65px;">' . $row["name"] . ' - Device '. $row["board"] . ' <!--(<i><a onclick="deleteOutput(this)" href="javascript:void(0);" id="' . $row["id"] . '">Delete</a></i>)--><label class="switch"><input type="checkbox" onchange="updateOutput(this)" id="' . $row["id"] . '" ' . $button_checked . '><span class="slider"></span></label></h3>';
                            }
                        }
                    
                        $result2 = getAllBoards();
                        $html_boards = null;
                        if ($result2) {
                            $html_boards .= '';
                            while ($row = $result2->fetch_assoc()) {
                                $row_reading_time = $row["last_request"];
                                // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
                                //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));
                    
                                // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
                                //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 7 hours"));
                                $html_boards .= '<p><strong>' . $row["board"] . '</strong> - Last Request Time: '. $row_reading_time . '</p>';
                            }
                        }
                    ?>
                    <?php echo $html_buttons; ?>
                    
                    <script>
                        function updateOutput(element) {
                            var xhr = new XMLHttpRequest();
                            if(element.checked){
                                xhr.open("GET", "esp-outputs-action.php?action=output_update&id="+element.id+"&state=1", true);
                            }
                            else {
                                xhr.open("GET", "esp-outputs-action.php?action=output_update&id="+element.id+"&state=0", true);
                            }
                            xhr.send();
                        }
                    
                        function deleteOutput(element) {
                            var result = confirm("Want to delete this output?");
                            if (result) {
                                var xhr = new XMLHttpRequest();
                                xhr.open("GET", "esp-outputs-action.php?action=output_delete&id="+element.id, true);
                                xhr.send();
                                alert("Output deleted");
                                setTimeout(function(){ window.location.reload(); });
                            }
                        }
                    
                        function createOutput(element) {
                            var xhr = new XMLHttpRequest();
                            xhr.open("POST", "esp-outputs-action.php", true);
                    
                            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    
                            xhr.onreadystatechange = function() {
                                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                                    alert("Output created");
                                    setTimeout(function(){ window.location.reload(); });
                                }
                            }
                            var outputName = document.getElementById("outputName").value;
                            var outputBoard = document.getElementById("outputBoard").value;
                            var outputGpio = document.getElementById("outputGpio").value;
                            var outputState = document.getElementById("outputState").value;
                            var httpRequestData = "action=output_create&name="+outputName+"&board="+outputBoard+"&gpio="+outputGpio+"&state="+outputState;
                            xhr.send(httpRequestData);
                        }
                    </script>  