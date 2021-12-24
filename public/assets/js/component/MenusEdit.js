class MenusList extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            error: null,
            isLoaded: false,
            menus: [],
            menuId: null,
            menuName: null,
            menuItems: null
        };

    }

    componentDidMount() {
        fetch("/api/menu")
            .then(res => res.json())
            .then(
                (result) => {
                    this.setState({
                        isLoaded: true,
                        menus: result.menus,
                        menuId: null,
                        menuName: null,
                        menuItems: null,
                    });
                },
                (error) => {
                    this.setState({
                        isLoaded: true,
                        menus: [],
                        menuId: null,
                        menuName: null,
                        menuItems: null,
                        error
                    });
                }
            )
    }

    fetchMenu(menuId) {
        this.setState({isLoaded: false});

        fetch("/api/menu/" + menuId)
            .then(res => res.json())
            .then(
                (result) => {
                    this.setState({
                        isLoaded: true,
                        menuId: result.menuId,
                        menuName: result.name,
                        menuItems: result.items
                    });
                },
                (error) => {
                    this.setState({
                        menuId: null,
                        menuName: null,
                        menuItems: null,
                        isLoaded: true,
                        error
                    });
                }
            )
    }

    renderBrowseMenus() {
        const { menus, menuId } = this.state;

        return menus.map(item => (
            <li class="list-group-item d-flex justify-content-between text-start align-items-center" key={item.menuId}>
                <span>
                    <i class="fas fa-bars me-5"></i>
                    {item.name}
                </span>
                <button class="btn btn-link" onClick={() => this.fetchMenu(item.menuId)}>
                    <i class="fas fa-edit"></i>
                </button>
            </li>
        ));
    }

    renderMenuItems(){
        const { menuItems } = this.state;

        return menuItems.map(item => (
            <a href="#" class="list-group-item list-group-item-action" aria-current="true" key={item.menuItemId}>
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{item.displayTitle}</h5>
                    <small>{item.daysAgo} days ago <i class="far fa-calendar"></i></small>
                </div>
                <p class="mb-1"><a href={item.displayUrl}>{item.displayUrl}</a></p>
            </a>
        ));
    }

    renderEditMenu(){
        const { menuId, menuName, menuItems} = this.state;

        return (
            <div class="mb-3">
                <input class="form-control form-control-lg" type="text" value={menuName} placeholder="Enter a title for this menu"/>
            </div>
        );

    }

    render() {
        const { error, isLoaded, menuId, menuData} = this.state;

        if (error) {
            return <div>Error: {error.message}</div>;
        }

        if (!isLoaded) {
            return (
                <div class="text-center">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            );
        }

        if(menuId !== null){
            return (
                <div>

                    <div class="row">
                        <div class="col">
                            <h2>Edit menu</h2>
                        </div>
                        <div class="col text-end">
                            <button class="btn btn-link text-danger pull-end" onClick={() => this.setState({menuId: null})}>
                                Cancel <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    {this.renderEditMenu()}

                    <h3>Change menu links</h3>
                    <div class="card bg-light">
                        <h5 class="card-header">Links</h5>
                        <div class="card-body">
                            {this.renderMenuItems()}
                        </div>
                    </div>

                    <nav class="navbar navbar-light bg-light border mt-4 mb-4">
                        <div class="container-fluid">
                            <form class="d-flex">
                                <button type="button" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                    </nav>



                </div>
            );
        }

        return (
            <div>
                <h2>My Menus</h2>
                <ul class="list-group">
                    {this.renderBrowseMenus()}
                </ul>
            </div>
        );

    }
}

ReactDOM.render(<MenusList />, document.getElementById("menuList"));
