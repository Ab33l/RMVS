package config

import (
	"html/template"
	"log"
)

//AppConfig holds the application config...Site wide configuration to avoid import cycle
type AppConfig struct {
	UseCache      bool
	TemplateCache map[string]*template.Template
	InfoLog       *log.Logger
}
