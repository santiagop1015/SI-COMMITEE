<!-- Control Sidebar -->
<aside id="idAside" class="control-sidebar control-sidebar-dark position-fixed"
            style="border-radius: .25rem; height: 90%;">
            <!-- Control sidebar content goes here -->

            <div id="idCard" class="card direct-chat direct-chat-primary direct-chat-contacts-open"
                style="position: relative; left: 0px; top: 0px; height: 100%">
                <div class="card-header ui-sortable-handle" style="">
                    <h3 class="card-title">Direct Chat</h3>

                    <div class="card-tools">
                        <button id="idButtonUsers" type="button" class="btn btn-tool" data-toggle="modal"
                            data-target="#modal-lg">
                            <i class="fa fa-users"></i>
                        </button>

                        <!--<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
                        Launch Large Modal
                    </button>
                        -->
                        <button id="idButtonMessages" type="button" class="btn btn-tool" data-toggle="tooltip"
                            title="Contacts" data-widget="chat-pane-toggle">
                            <i class="fas fa-comments"></i>
                        </button>

                        <button type="button" class="btn btn-tool" data-widget="control-sidebar" data-slide="true"><i
                                class="fas fa-times"></i>
                            <!-- 
                                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="far fa-comments white"></i>
                    </a>
                            -->
                        </button>
                    </div>

                </div>

                <div id="idCardNameChat" class="card-header ui-sortable-handle" style="
                          padding-left: 5px;
                          padding-top: 5px;
                          display: None;
                         ">

                    <h3 id="idNameChat" class="card-title" style="color: rgb(33, 37, 41); font-size: 14px;">
                        Seleccione un Chat</h3>

                </div>


                <!-- /.card-header -->
                <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <div id="idContainerFather" class="direct-chat-messages" style="height: 100%">
                        <!-- <div class="card-header ui-sortable-handle" style="
                          padding-left: 5px;
                          padding-top: 5px;
                         ">
                        <h3 id="idNameChat" class="card-title" style="color: black;">
                            US-Visitors Report</h3>
                    </div>
                    -->
                        <div id="idContainerMessages" class="ContainerMessages">

                        </div>

                    </div>
                    <!--/.direct-chat-messages-->

                    <!-- Contacts are loaded here -->
                    <div class="direct-chat-contacts" style="height: 100%; border-radius: .25rem;">
                        <ul id="idContactsList" class="contacts-list mb-0">

                        </ul>
                        <!-- /.contacts-list -->
                    </div>
                    <!-- /.direct-chat-pane -->
                </div>
                <!-- /.card-body -->
                <div id="idFormChat" class="card-footer" style="display: none;">

                    <form id="idFormSendMessage">

                        <div id="idEnviarMensaje" class="input-group">
                            <input id="idMessage_Content" type="text" name="message" placeholder="Escribe un mensaje"
                                class="form-control">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-primary send_chat">Enviar</button>
                            </span>
                        </div>
                    </form>

                </div>
                <!-- /.card-footer-->
            </div>


        </aside>
        <!-- /.control-sidebar -->
<script type="text/javascript" src="chat/chat.js"></script>
