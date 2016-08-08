#!/usr/bin/env python

# error reports
import cgitb
cgitb.enable()

import cgi

# get form data
form = cgi.FieldStorage()

print "Content-type: text/html"
print

print "<html>"
print "<body>"

print "Welcome, ", form["uname"].value, "<br>"
print "<form action='new_recipe.py'>"
print "<input type='submit' value='New Recipe'>"
print "</form>"
print "Recipes<br>"
#print <a href="recipe_page.py">Recipe page<

print "</body>"
print "</html>"


