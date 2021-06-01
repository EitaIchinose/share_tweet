@extends('layout')

@section('content')
<div id="main_root"></div>

<script type="text/babel">
  const MAIN = () => {
    return (
      <div className="main_container">
        <div className="tweet_content">ツイート内容</div>
        <div className="img_content">画像</div>
        <div className="user_container">
          <div className="good_content">いいね</div>
          <div className="user_content">by ユーザー名</div>
        </div>
      </div>
    )
  }

  ReactDOM.render(
    <MAIN />,
    document.getElementById('main_root')
  )
</script>
@endsection