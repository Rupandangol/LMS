@extends('Frontend.layout.frontendMaster')
@section('content')
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-bars"></i> Student
                <small>About</small>
            </h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">


            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab"
                                                              data-toggle="tab" aria-expanded="true">Home</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab"
                                                        data-toggle="tab" aria-expanded="false">Profile</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2"
                                                        data-toggle="tab" aria-expanded="false">Activity</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt error id obcaecati
                            provident quae veniam! Accusantium cumque doloribus, excepturi inventore quam quisquam
                            tempore. Amet esse harum itaque iure rem sapiente.Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Deserunt error id obcaecati
                            provident quae veniam! Accusantium cumque doloribus, excepturi inventore quam quisquam
                            tempore. Amet esse harum itaque iure rem sapiente.Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Deserunt error id obcaecati
                            provident quae veniam! Accusantium cumque doloribus, excepturi inventore quam quisquam
                            tempore. Amet esse harum itaque iure rem sapiente.</p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        <p>lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, delectus, dolores dolorum
                            enim iste nobis officiis quam, quidem repellendus vel velit voluptas voluptatum. Aperiam
                            blanditiis maxime, quis reiciendis voluptatibus voluptatum!orem ipsum dolor sit amet,
                            consectetur adipisicing elit. Aliquam, delectus, dolores dolorum
                            enim iste nobis officiis quam, quidem repellendus vel velit voluptas voluptatum. Aperiam
                            blanditiis maxime, quis reiciendis voluptatibus voluptatum!orem ipsum dolor sit amet,
                            consectetur adipisicing elit. Aliquam, delectus, dolores dolorum
                            enim iste nobis officiis quam, quidem repellendus vel velit voluptas voluptatum. Aperiam
                            blanditiis maxime, quis reiciendis voluptatibus voluptatum!L</p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A assumenda dignissimos eligendi
                            illum magnam modi, molestiae numquam porro quasi veritatis! Asperiores doloremque earum id
                            iste maiores perferendis saepe tempora voluptate.Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. A assumenda dignissimos eligendi
                            illum magnam modi, molestiae numquam porro quasi veritatis! Asperiores doloremque earum id
                            iste maiores perferendis saepe tempora voluptate. </p>
                    </div>
                </div>
            </div>

        </div>
    </div>





@endsection