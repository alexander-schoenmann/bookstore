import {BookStoreService} from "./book-store.service";
import {FormControl} from "@angular/forms";
import {map, Observable} from "rxjs";

export class BookValidators {

  static isbnExists(bs: BookStoreService){
    return function (control: FormControl): Observable<any> {
      return bs.check(control.value).pipe(map(exists => !exists ? null : {isbnExists: {valid: false}}));
    }
  }

}
