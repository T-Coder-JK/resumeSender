import React from 'react';
import ReactDOM from 'react-dom';

class SideBar extends React.Component{
    constructor(props) {
        super(props);

    }

    render(){
        return(
            <div className="container sidebar-select py-5">
                <div className="py-2 text-white" style={{paddingLeft: "5px"}}>
                    <div className="pl-md-4 pl-2">
                        <h4 className="font-weight-light nav-title">{this.props.user.name}</h4>
                    </div>
                </div>
                <div className="side-links py-2 text-white-50">
                    <div className="pl-md-4 pl-2">
                        <img src="/images/SVG/dashboard/dashboard_icon.svg" alt="image"/><a href="/">Home Page</a>
                    </div>
                </div>
                <div className="side-links py-2 text-white-50">
                    <div className="pl-md-4 pl-2">
                        <img src="/images/SVG/dashboard/emailTemplate_icon.svg" alt="image"/><a href="/emailTemplates">Email Template</a>
                    </div>
                </div>
                <div className="side-links py-2 text-white-50">
                    <div className="pl-md-4 pl-2">
                        <img src="/images/SVG/dashboard/newApplication_icon.svg" alt="image"/><a href={"/application/"+this.props.user.id+"/create"}>New Application</a>
                    </div>
                </div>
                <div className="side-links py-2 text-white-50">
                    <div className="pl-md-4 pl-2">
                        <img src="/images/SVG/dashboard/logout_icon.svg" alt="image"/><a href="#" onClick={(e)=>{
                            e.preventDefault();
                            $('#logout-form').submit();
                        }}>Logout</a>
                    </div>
                </div>

            </div>
        )
    }
}


if(document.getElementById('sideBar')){
    axios({
        method: 'get',
        url: '/dashboard/getUser',

    })
        .then(response => {
            ReactDOM.render(<SideBar user={response.data}/>, document.getElementById('sideBar'));
        })
        .catch(error => {
            console.log(error)
        });
}
