@extends('layout')

@section('content')
<div id="main_root"></div>

<script type="text/babel">
  class Tweet extends React.Component {
    constructor(){
      super();
      let csrf_token = document.head.querySelector('meta[name="csrf-token"]').content;
      this.state = {
          csrf_token: csrf_token
      }
    }

    render(){
      return(
        <div className="tweet_form">
          <form action="/post" method="post" encType="multipart/form-data" className="create_form">
          <input type="hidden" name="_token" value={ this.state.csrf_token } /> 
          <input type="hidden" name="user_id" value="1" />
          @if($errors->has('text'))
            <div className="error_msg">{{ $errors->first('text') }}</div>
          @endif
            <div className="mb-3">
              <textarea className="form-control" name="text" rows="1"></textarea>
            </div>
            <div className="mb-3 img-form">
              <input className="form-control" type="file" id="formFile" name="image_path" />
            </div>
            <div className="tweet_btn">
              <button type="submit" className="btn btn-primary">ツイートする</button>
            </div>
          </form>
        </div>
      )
    }
  }

  const Tweet_content = () => {
    return (
      <React.Fragment>
        @if(count($tweets) > 0)
          @foreach($tweets as $tweet)
            <div className="tweet_container">
              <div className="tweet_content">{{ $tweet->text}}</div>
              @if($tweet->image_path != null)
                <img src="{{ asset('storage/images/'.$tweet->image_path) }}" alt="画像" />
              @endif
              <div className="user_container">
                <div className="good_content">いいね</div>
                <div className="user_content">by ユーザー名</div>
              </div>
            </div>
          @endforeach
        @else
          <div>ツイートがありません</div>
        @endif
      </React.Fragment>
    )
  }

  const Footer = () => {
    return (
      <footer className="footer bg-dark">
        <div className="text-center">
          <span className="text-light">Copyright &copy; 2021 Eita_eng</span>
        </div>
      </footer>
    )
  }

  const MAIN = () => {
    return (
      <div className="main_container">
        @auth
        <Tweet />
        @endauth
        <Tweet_content />
        <Footer />
      </div>
    )
  }

  ReactDOM.render(
    <MAIN />,
    document.getElementById('main_root')
  )

  // テキストエリアの高さ自動調整
  $("textarea").attr("rows", 1).on("input", e => {
    $(e.target).height(0).innerHeight(e.target.scrollHeight);
  });
</script>
@endsection