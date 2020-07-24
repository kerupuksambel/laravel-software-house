<!DOCTYPE html>
<html>
    <head>
        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' type="text/css" rel="stylesheet">
    </head>
    <body>
        <div class="container-fluid mt-100">
            <div class="d-flex flex-wrap justify-content-between">
                <div> <button type="button" class="btn btn-shadow btn-wide btn-primary"> <span class="btn-icon-wrapper pr-2 opacity-7"> <i class="fa fa-plus fa-w-20"></i> </span> New thread </button> </div>
                <div class="col-12 col-md-3 p-0 mb-3"> <input type="text" class="form-control" placeholder="Search..."> </div>
            </div>
            <div class="card mb-3">
                <div class="card-header pl-0 pr-0">
                    <div class="row no-gutters w-100 align-items-center">
                        <div class="col ml-3">Pertanyaan</div>
                        <div class="col-4 text-muted">
                            <div class="row no-gutters align-items-center">
                                <div class="col-4">Replies</div>
                                <div class="col-8">Last update</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body py-3">
                    <div class="row no-gutters align-items-center">
                        <div class="col"> <a href="javascript:void(0)" class="text-big" data-abc="true">How can i change the username?</a>
                            <div class="text-muted small mt-1">Started 25 days ago &nbsp;·&nbsp; <a href="javascript:void(0)" class="text-muted" data-abc="true">Neon Mandela</a></div>
                        </div>
                        <div class="d-none d-md-block col-4">
                            <div class="row no-gutters align-items-center">
                                <div class="col-4">12</div>
                                <div class="media col-8 align-items-center"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1574583246/AAA/2.jpg" alt="" class="d-block ui-w-30 rounded-circle">
                                    <div class="media-body flex-truncate ml-2">
                                        <div class="line-height-1 text-truncate">1 day ago</div> <a href="javascript:void(0)" class="text-muted small text-truncate" data-abc="true">by Tim cook</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($question as $q)
                    
                @endforeach
                <hr class="m-0">
                <div class="card-body py-3">
                    <div class="row no-gutters align-items-center">
                        <div class="col"> <a href="javascript:void(0)" class="text-big" data-abc="true">{{ $q->question_title }}</a> <span class="badge badge-success align-text-bottom ml-1">Solved</span>
                            <div class="text-muted small mt-1">Started 5 days ago &nbsp;·&nbsp; <a href="javascript:void(0)" class="text-muted" data-abc="true">Allize Rome</a></div>
                        </div>
                        <div class="d-none d-md-block col-4">
                            <div class="row no-gutters align-items-center">
                                <div class="col-4">123</div>
                                <div class="media col-8 align-items-center"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1574583319/AAA/3.jpg" alt="" class="d-block ui-w-30 rounded-circle">
                                    <div class="media-body flex-truncate ml-2">
                                        <div class="line-height-1 text-truncate">1 day ago</div> <a href="javascript:void(0)" class="text-muted small text-truncate" data-abc="true">by Steve smith</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <ul class="pagination mb-5">
                    <li class="page-item disabled"><a class="page-link" href="javascript:void(0)" data-abc="true">«</a></li>
                    <li class="page-item active"><a class="page-link" href="javascript:void(0)" data-abc="true">1</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)" data-abc="true">2</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)" data-abc="true">3</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)" data-abc="true">»</a></li>
                </ul>
            </nav>
        </div>
    </body>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
</html>