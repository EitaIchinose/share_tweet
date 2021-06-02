@extends('layout')

@section('content')
<div id="main_root"></div>

<script type="text/babel">
  const Tweet = () => {
    return(
      <div className="tweet_form">
        <form action="/create" method="post" encType="multipart/form-data" className="create_form">
          <div className="mb-3">
            <textarea className="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
        </form>
        <div className="tweet_btn">
          <button type="submit" className="btn btn-primary">ツイートする</button>
        </div>
      </div>
    )
  }

  const Tweet_content = () => {
    return (
      <div className="tweet_container">
        <div className="tweet_content">ツイート内容</div>
        <div className="img_content">画像</div>
        <div className="user_container">
          <div className="good_content">いいね</div>
          <div className="user_content">by ユーザー名</div>
        </div>
      </div>
    )
  }

  const MAIN = () => {
    return (
      <div className="main_container">
        @auth
        <Tweet />
        @endauth
        <Tweet_content />
      </div>
    )
  }

  ReactDOM.render(
    <MAIN />,
    document.getElementById('main_root')
  )
</script>
@endsection