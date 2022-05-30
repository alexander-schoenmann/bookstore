import { Injectable } from '@angular/core';
import { Author, Book, Image } from "./book";
import { HttpClient, HttpClientModule } from "@angular/common/http";
import { Observable, throwError } from "rxjs";
import { catchError, retry } from "rxjs";

@Injectable({
  providedIn: 'root'
})
export class BookStoreService {

  private api = 'https://bookstore22.s1910456030.student.kwmhgb.at/api';

  constructor(private http: HttpClient) {

  }

  getAll(): Observable<Array<Book>> {
    return this.http.get<Array<Book>>(`${this.api}/books`).pipe(retry(3)).pipe(catchError(this.errorHandler));
  }

  getSingle(isbn: string) : Observable<Book> {
    return this.http.get<Book>(`${this.api}/books/${isbn}`).pipe(retry(3)).pipe(catchError(this.errorHandler));
  }

  remove(isbn: string) : Observable<any> {
    return this.http.delete(`${this.api}/books/${isbn}`).pipe(retry(3)).pipe(catchError(this.errorHandler));
  }

  getAllSearch(searchTerm:string) : Observable<Array<Book>> {
    return this.http.get<Book>(`${this.api}/books/search/${searchTerm}`).pipe(retry(3)).pipe(catchError(this.errorHandler));
  }

  update(book: Book) : Observable<any> {
    return this.http.put(`${this.api}/books/${book.isbn}`, book).pipe(retry(3)).pipe(catchError(this.errorHandler));
  }

  create(book: Book) : Observable<any> {
    return this.http.post(`${this.api}/books`, book).pipe(retry(3)).pipe(catchError(this.errorHandler));
  }

  check(isbn: string): Observable<Boolean> {
    return this.http.get<Boolean>(`${this.api}/books/checkisbn/${isbn}`).pipe(retry(3)).pipe(catchError(this.errorHandler));
  }

  private errorHandler(error: Error | any): Observable<any> {
    return throwError(() => new Error(error));
  }

}
