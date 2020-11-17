import React from 'react';
import {BrowserRouter as Router, Switch, Route} from 'react-router-dom';
import ReactDOM from "react-dom";
import CardSection from './CardSection';
import BlogEditor from './BlogEditor';


class Dashboard extends React.Component{
    render(){
        return(
            <Router>
                <Switch>
                    <Route exact path='/dashboard'>
                        <CardSection/>
                    </Route>
                    <Route path='/dashboard/editor'>
                        <BlogEditor/>
                    </Route>
                </Switch>
            </Router>
        );
    }
}

if(document.getElementById('content')){
    const content = document.getElementById('content');
    ReactDOM.render(<Dashboard/>, content);
}
