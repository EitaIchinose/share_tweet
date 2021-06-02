<div id="root"></div>

<script type="text/babel">
(() => {

  class Header extends React.Component {
    constructor() {
      super();
      let csrf_token = document.head.querySelector('meta[name="csrf-token"]').content;
      this.state = {
          csrf_token: csrf_token
      }
    }

    logOut = () => {
        event.preventDefault();
        document.getElementById('logout-form').submit();
      }

    headerTitle() {
      return (
        <div className="header-title">Share.Tweet</div>
      )
    }

    guest(){
      return(
        <div className="icon_container">
          <div className="dropdown">
            <button className="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              <i className="fa fa-user"></i>
            </button>
            <ul className="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <li><a className="dropdown-item" href="{{ route('register') }}">新規登録</a></li>
              <li><a className="dropdown-item" href="{{ route('login') }}">ログイン</a></li>
            </ul>
          </div>
        </div>
      )
    }

    render() {
      return(
        <div className="header-container">
          @guest
            <this.headerTitle />
            <this.guest />
          @endguest
          @auth
            <this.headerTitle />
            <div className="icon_container">
              <div className="dropdown">
                <button className="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                  <i className="fa fa-user"></i>
                </button>
                <ul className="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a className="dropdown-item" href="#">マイページ</a></li>
                  <li>
                    <a className="dropdown-item" href='#' onClick={this.logOut} >ログアウト</a>
                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                      <input type="hidden" name="_token" value={ this.state.csrf_token } /> 
                    </form>
                  </li>
                </ul>
              </div>
            </div>
          @endauth
        </div>
      )
    }
  }

  ReactDOM.render(
    <Header />,
    document.getElementById('root')
  )
})();
</script>