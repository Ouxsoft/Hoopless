class MenuItemList extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            error: null,
            isLoaded: false,
            items: []
        };
    }

    getMenuItemUrl(menuId) {
        return "/backend/edit/menu-item/" + menuId;
    }

    componentDidMount() {
        fetch("/api/menu")
            .then(res => res.json())
            .then(
                (result) => {
                    this.setState({
                        isLoaded: true,
                        items: result.menus
                    });
                },
                (error) => {
                    this.setState({
                        isLoaded: true,
                        error
                    });
                }
            )
    }

    render() {
        const { error, isLoaded, items } = this.state;
        if (error) {
            return <div>Error: {error.message}</div>;
        } else if (!isLoaded) {
            return (
                <div class="text-center">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            );
        } else {
            return (
                <ul class="list-group">
                    {items.map(item => (
                        <li class="list-group-item" key={item.menuId}>
                            <a href={this.getMenuItemUrl(item.menuId)}>{item.name}</a>
                        </li>
                    ))}
                </ul>
            );
        }
    }
}

ReactDOM.render(<MenusList />, document.getElementById("menuList"));
