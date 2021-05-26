<div id="root"></div>

<script type="text/babel">
(() => {

  class Header extends React.Component {
    constructor() {
      super();
    }

    render() {
      return(
        <div className="header-container">
          <div className="header-title">Share.Tweet</div>
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
  }

  ReactDOM.render(
    <Header />,
    document.getElementById('root')
  )
})();
</script>