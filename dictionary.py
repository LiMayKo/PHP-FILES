D = {}
while True:
    user = str(
        input(
            'MENU \n[A]dd a book \n[E]dit a book \n[D]elete a book \n[S]earch a book \n: '
        ))
#ADD PART
    if user.lower() == 'a':
        add_another = True
        while add_another:
            isbn = input('ENTER ISBN: ')
            title = input('ENTER TITLE: ')
            author = input('ENTER AUTHOR: ')
            year = input('ENTER YEAR: ')
            genre = input('ENTER GENRE: ')
#CHECKING IF ISBN IS DUPLICATED 
            if isbn in D:
                print()
                print(isbn, 'ISBN IS GIVEN!')
                continue
#ENTERING VALID ISBN
            else:
                D[isbn] = {
                    'ISBN': isbn,
                    'TITLE': title,
                    'AUTHOR': author,
                    'YEAR': year,
                    'GENRE': genre
                }
                print()
                print('BOOK ADDED!')
                print(D)
                print()
                sub_add = input('Do you want to add another book? Y/N: ')
                print()
                if sub_add.lower() == 'n':
                    add_another = False
                    break
                elif sub_add.lower() == 'y':
                    add_another = True
                    continue
                else:
                  print('INVALID INPUT! ')
                  break

#BREAK OF ADD SUB MENU

#EDIT PART
    elif user.lower() == 'e':
        isbn = input('ENTER ISBN: ')
        if isbn in D:
            edit_input = input(
                'Editing ISBN# ' + str(isbn) +
                ' book... \n[I]SBN\n[T]ITLE\n[A]UTHOR\n[Y]EAR\n[G]ENRE\n: ')
            print()
#EDITING ISBN
            if edit_input.lower() == 'i':
                isbn = input('ENTER NEW ISBN: ')
                if isbn in D:
                    print()
                    print(isbn, 'ISBN IS GIVEN!')
                    continue
                else:
                    print('ISBN UPDATED! ')
                    D[isbn] = {
                        'ISBN': isbn,
                        'TITLE': title,
                        'AUTHOR': author,
                        'YEAR': year,
                        'GENRE': genre
                    }
                    for key, value in D.items():
                        if (value['ISBN']) == isbn:
                            print(key, value)
                        continue
#EDITING TITLE
            elif edit_input.lower() == 't':
                title = input('ENTER NEW TITLE: ')
                D[isbn] = {
                    'ISBN': isbn,
                    'TITLE': title,
                    'AUTHOR': author,
                    'YEAR': year,
                    'GENRE': genre
                }
                for key, value in D.items():
                    if (value['TITLE']) == title:
                        print(key, value)
                    continue
#EDITING AUTHOR
            elif edit_input.lower() == 'a':
                author = input('ENTER NEW AUTHOR: ')
                D[isbn] = {
                    'ISBN': isbn,
                    'TITLE': title,
                    'AUTHOR': author,
                    'YEAR': year,
                    'GENRE': genre
                }
                for key, value in D.items():
                    if (value['AUTHOR']) == author:
                        print(key, value)
                    continue
#EDITING YEAR
            elif edit_input.lower() == 'y':
                year = input('ENTER NEW YEAR: ')
                D[isbn] = {
                    'ISBN': isbn,
                    'TITLE': title,
                    'AUTHOR': author,
                    'YEAR': year,
                    'GENRE': genre
                }
                for key, value in D.items():
                    if (value['YEAR']) == year:
                        print(key, value)
                    continue

#EDITING GENRE
            elif edit_input.lower() == 'g':
                genre = input('ENTER NEW GENRE: ')
                D[isbn] = {
                    'ISBN': isbn,
                    'TITLE': title,
                    'AUTHOR': author,
                    'YEAR': year,
                    'GENRE': genre
                }
                for key, value in D.items():
                    if (value['GENRE']) == genre:
                        print(key, value)
                    continue
#EDIT LAST IF LOOP
            else:
                print('INVALID INPUT!')
                continue
#EDIT ELSE
        else:
            print('ISBN NOT FOUND! ')
            print()
            continue
#DELETE
    elif user.lower() == 'd':
        isbn = input('ENTER ISBN: ')
        D[isbn] = {
            'ISBN': isbn,
            'TITLE': title,
            'AUTHOR': author,
            'YEAR': year,
            'GENRE': genre
        }
        print('ISBN #', isbn, 'DELETED!')
        del D[isbn]
        print()
        print('UPDATED BOOKS')
        print(D)
        continue
#SEARCHs
    elif user.lower() == 's':
        print('Searching...')
        search_input = input('[I]SBN\n[T]ITLE\n[A]UTHOR\n[Y]EAR\n[G]ENRE\n: ')
#SEARCHING ISBN
        if search_input.lower() == 'i':
            isbn = input('ENTER ISBN: ')
            for key, value in D.items():
                if (value['ISBN']) == isbn:
                    print(key, value)
                    continue
                else:
                    continue
#SEARCHING TITLE
        elif search_input.lower() == 't':
            title = input('ENTER TITLE: ')
            for key, value in D.items():
                if (value['TITLE']) == title:
                    print(key, value)
                    continue
                else:
                    
                    continue
#SEARCHING YEAR
        elif search_input.lower() == 'a':
            author = input('ENTER AUTHOR: ')
            for key, value in D.items():
                if (value['AUTHOR']) == author:
                    print(key, value)
                    continue
                else:
                    continue
#SEARCHING YEAR
        elif search_input.lower() == 'y':
            year = input('ENTER YEAR: ')
            for key, value in D.items():
                if (value['YEAR']) == year:
                    print(key, value)
                    continue
                else:
                    continue
#SEARCHING GENRE
        elif search_input.lower() == 'g':
            genre = input('ENTER GENRE: ')
            for key, value in D.items():
                if (value['GENRE']) == genre:
                    print(key, value)
                    continue
                else:
                    continue
#END OF MAIN IF LOOP         
    else:
        print('INVALID INPUT! ')
        print()
        continue
