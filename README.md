# EXPENSE-MANAGEMENT-AND-INVOICE-GENERATION
A Website to handle expenses made on various Projects, generate coressponding Invoice. A user can Log in, add the Project details, add the Expense details, and Generate an Invoice for an Expense.
**FRONTEND**
1. First webpage allows a user to Sign up / Register or Login using Credentials.
2. After Log In, there is a Main Dashboard where he can see all the
different ongoing projects.
3. Each Project has its Project Details and the Expense Detail associated with it.
4. To add a New Project, a Form has to be filled, the form has different fields like
the Name of the Project / Project Title Project Description, Budget allocated, Project team leader, Project completion Date.
5. To add an Expense to a particular project, the user has to fill out a Form, which has details like the Name of the person who spent, Project Name, Expense Name, Details, Date, Invoice
number, Amount spent on the bill.
6. Once an Expense of a particular project is added, the amount is subtracted from the Total Budget.
7. On selecting a particular expense, the Invoice will be generated. The Invoice will have all the details of a particular expense. The Invoice can be downloaded as a (.pdf)
**BACKEND**
1. In the Backend, we will have three Database tables.
2. Every project will create a new row in the Project Details table, which will have
the corresponding project details.
3. Every expense will create a new row in the Expense Details table, which will
have the corresponding expense details. 
4. Every User will create a new row in the Register table, which will have the
corresponding User Details
