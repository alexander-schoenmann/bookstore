import { Component } from '@angular/core';
import {Book} from "./shared/book";
import {AuthenticationService} from "./shared/authentication.service";

@Component({
  selector: 'bs-root',
  templateUrl: './app.component.html',
  styles: []
})
export class AppComponent {

  book: Book | undefined;

  listOn = true;
  detailsOn = false;

  constructor(private authService: AuthenticationService) { }

  isLoggedIn(){
    return this.authService.isLoggedIn();
  }

  getLoginLabel(){
    return this.isLoggedIn() ? "Logout" : "Login";
  }

  title = 'bookstore22';
}
