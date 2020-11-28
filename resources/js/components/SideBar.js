import React from 'react';
import ReactDOM from 'react-dom';

class SideBar extends React.Component{
    constructor(props) {
        super(props);

    }

    render(){
        return(
            <div>
                <div id="side-full" className="container sidebar-select py-5">
                    <div className="py-2 text-white" style={{paddingLeft: "5px"}}>
                        <div className="pl-md-4 pl-2">
                            <h4 id="full-name" className="font-weight-light nav-title">{this.props.userName}</h4>
                        </div>
                    </div>
                    <div className="side-links py-2 text-white-50">
                        <div className="pl-md-4 pl-2">
                            <img src="/images/SVG/dashboard/home_icon.svg" alt="image"/><a href="/">Home Page</a>
                        </div>
                    </div>
                    <div className="side-links py-2 text-white-50">
                        <div className="pl-md-4 pl-2">
                            <img src="/images/SVG/dashboard/dashboard_icon.svg" alt="image"/><a href="/dashboard">User Dashboard</a>
                        </div>
                    </div>
                    <div className="side-links py-2 text-white-50">
                        <div className="pl-md-4 pl-2">
                            <img src="/images/SVG/dashboard/emailTemplate_icon.svg" alt="image"/><a href="/emailTemplates">Email Template</a>
                        </div>
                    </div>
                    <div className="side-links py-2 text-white-50">
                        <div className="pl-md-4 pl-2">
                            <img src="/images/SVG/dashboard/newApplication_icon.svg" alt="image"/><a href={"/application/"+this.props.userId+"/new_job"}>New Application</a>
                        </div>
                    </div>
                    <div className="side-links py-2 text-white-50">
                        <div className="pl-md-4 pl-2">
                            <img src="/images/SVG/dashboard/blog_icon.svg" alt="image"/><a href="/dashboard/editor">New Blog</a>
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
                <div id="side-min" className="container sidebar-select py-3">
                    <a href="/">
                        <div className="side-links py-3 text-white">
                            <img src="/images/SVG/dashboard/home_icon.svg" alt="image"/>
                            <p>Home</p>
                        </div>
                    </a>
                    <a href="/dashboard">
                        <div className="side-links py-3 text-white">
                            <img src="/images/SVG/dashboard/dashboard_icon.svg" alt="image"/>
                            <p>Dashboard</p>
                        </div>
                    </a>
                    <a href="/emailTemplates">
                        <div className="side-links py-3 text-white">
                            <img src="/images/SVG/dashboard/emailTemplate_icon.svg" alt="image"/>
                            <p>Email</p>
                        </div>
                    </a>
                    <a href={"/application/"+this.props.userId+"/new_job"}>
                        <div className="side-links py-3 text-white">
                            <img src="/images/SVG/dashboard/newApplication_icon.svg" alt="image"/>
                            <p>Application</p>
                        </div>
                    </a>
                    <a href="/dashboard/editor">
                        <div className="side-links py-3 text-white">
                            <img src="/images/SVG/dashboard/blog_icon.svg" alt="image"/>
                            <p>Blog+</p>
                        </div>
                    </a>
                    <a href="#" onClick={(e)=>{
                        e.preventDefault();
                        $('#logout-form').submit();
                    }}>
                        <div className="side-links py-3 text-white">
                            <img src="/images/SVG/dashboard/logout_icon.svg" alt="image"/>
                            <p>Logout</p>
                        </div>
                    </a>
                </div>
            </div>
        )
    }
}

if(document.getElementById('sideBar')){
    const sideBar = document.getElementById('sideBar');
    let userName = sideBar.getAttribute('user-name');
    let userId = sideBar.getAttribute('user-id');
    ReactDOM.render(<SideBar userName={userName} userId={userId}/>, sideBar);
}
