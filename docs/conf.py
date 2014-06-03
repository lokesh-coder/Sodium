import sys, os
from sphinx.highlighting import lexers
from pygments.lexers.web import PhpLexer

lexers['php'] = PhpLexer(startinline=True, linenos=1)
lexers['php-annotations'] = PhpLexer(startinline=True, linenos=1)
primary_domain = 'php'

# -- General configuration -----------------------------------------------------

extensions = []
templates_path = ['_templates']
source_suffix = '.rst'
master_doc = 'index'

project = u'Sodium'
copyright = u'2014, Lokesh'
version = '1.0.1'
release = '1.0.1'

exclude_patterns = ['_build']

# -- Options for HTML output ---------------------------------------------------

# The name for this set of Sphinx documents.  If None, it defaults to
# "<project> v<release> documentation".
html_title = "Sodium documentation"
html_short_title = "Sodium"

# Add any paths that contain custom static files (such as style sheets) here,
# relative to this directory. They are copied after the builtin static files,
# so a file named "default.css" will overwrite the builtin "default.css".
html_static_path = ['_static']

# Custom sidebar templates, maps document names to template names.
html_sidebars = {
    '**':       ['localtoc.html', 'searchbox.html']
}

# Output file base name for HTML help builder.
htmlhelp_basename = 'Sodiumdoc'

# -- Guzzle Sphinx theme setup ------------------------------------------------

sys.path.insert(0, '/Users/dowling/projects/guzzle_sphinx_theme')

import guzzle_sphinx_theme
html_translator_class = 'guzzle_sphinx_theme.HTMLTranslator'
html_theme_path = guzzle_sphinx_theme.html_theme_path()
html_theme = 'guzzle_sphinx_theme'

# Guzzle theme options (see theme.conf for more information)
html_theme_options = {
    "project_nav_name": "Sodium",
    "github_user": "lokesh-coder",
    "github_repo": "https://github.com/lokesh-coder/Sodium",
    "disqus_comments_shortname": "sodium",
    "google_analytics_account": ""
}

# -- Options for LaTeX output --------------------------------------------------

latex_elements = {}

# Grouping the document tree into LaTeX files. List of tuples
# (source start file, target name, title, author, documentclass [howto/manual]).
latex_documents = [
  ('index', 'Sodium.tex', u'Sodium Documentation',
   u'Lokesh', 'manual'),
]

# -- Options for manual page output --------------------------------------------

# One entry per manual page. List of tuples
# (source start file, name, description, authors, manual section).
man_pages = [
    ('index', 'sodium', u'Sodium Documentation',
     [u'Lokesh'], 1)
]

# If true, show URL addresses after external links.
#man_show_urls = False

# -- Options for Texinfo output ------------------------------------------------

# Grouping the document tree into Texinfo files. List of tuples
# (source start file, target name, title, author,
#  dir menu entry, description, category)
texinfo_documents = [
  ('index', 'Sodium', u'Sodium Documentation',
   u'Lokesh', 'Sodium', 'One line description of project.',
   'Miscellaneous'),
]
