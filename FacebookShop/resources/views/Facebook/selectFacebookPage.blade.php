@extends('layout.adminDashboard')

@section('content')
    <?php
    require_once __DIR__ . '/../../../vendor/autoload.php';

    $fb = new Facebook\Facebook([
        'app_id' => '373936209778018',
        'app_secret' => '72094c189a4e25895733e4d8b581707c',
        'default_graph_version' => 'v2.10'

    ]);

    $helper = $fb->getRedirectLoginHelper();
    if (isset($_GET['state'])) {
        $helper->getPersistentDataHandler()->set('state', $_GET['state']);
    }

    try {
        $accessToken = $helper->getAccessToken();
    } catch (Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

    if (!isset($accessToken)) {
        if ($helper->getError()) {
            header('HTTP/1.0 401 Unauthorized');
            echo "Error: " . $helper->getError() . "\n";
            echo "Error Code: " . $helper->getErrorCode() . "\n";
            echo "Error Reason: " . $helper->getErrorReason() . "\n";
            echo "Error Description: " . $helper->getErrorDescription() . "\n";
        } else {
            header('HTTP/1.0 400 Bad Request');
            echo 'Bad request';
        }
        exit;
    }

    //    // Logged in
    //    echo '<h3>Access Token</h3>';
    //    var_dump($accessToken->getValue());

    $oAuth2Client = $fb->getOAuth2Client();

    if (!$accessToken->isLongLived()) {
        $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
    }

    $response = $fb->get("me?fields=id,first_name, last_name, email", $accessToken);
    $userData = $response->getGraphNode()->asArray();

    $page = $fb->get('/me/accounts', $accessToken);
    $pages = $page->getGraphEdge()->asArray();
    ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2 style="color: red"><b>Select Page</b></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left" method="post"
                          {{csrf_field()}}
                          action="{{route('createFacebookTab',['accessToken' => $accessToken])}}">
                        <div class="form-group">
                            <label class="control-label col-md-1 col-sm-1 col-xs-12">Select</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="form-control" name="page" style="font-size: large">
                                    <?php
                                    foreach ($pages as $key){
                                    ?>
                                    <option value="{{$key['id']}}">{{$key['name']}}</option>
                                    <?php

                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Select</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection