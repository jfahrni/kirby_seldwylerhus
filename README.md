# Pfadiheim Bülach – Kirby-Setup (Site-Files)

Dieses Paket enthält **nur** die projekt-spezifischen Kirby-Dateien (`/site`, `/content`, `/assets`) – **ohne** Kirby-Core.
Kirby ist lizenzpflichtig für öffentliche Websites; Installation & Lizenz siehe Kirby-Dokumentation.

## Ziel
- Inhalt & Seitenstruktur wie https://www.pfadiheim-buelach.ch/ (Home + Hausordnung)
- Schlankes, gut wartbares Frontend (ohne Frameworks), mit einfacher Pflege im Kirby Panel
- Cookie-Consent für eingebettete Google Maps (nur Laden nach Zustimmung)

## Voraussetzungen
- PHP-Version gemäß eingesetzter Kirby-Version (siehe Kirby Requirements)
- Webserver (Apache/nginx/Caddy)
- Schreibrechte auf `content/`, `media/`, `site/cache/` etc. (je nach Setup)

## Installation (empfohlen via Composer)
1) Kirby (Starterkit oder Plainkit) installieren, z.B.:
   composer create-project getkirby/plainkit pfadiheim

2) Aus diesem ZIP die Ordner **site/**, **content/**, **assets/** in das Kirby-Projekt kopieren
   (bestehende gleichnamige Ordner überschreiben/mergen).

3) Domain/DocumentRoot korrekt setzen (Kirby index.php muss erreichbar sein)

4) Panel einrichten:
   - Im Browser /panel öffnen
   - ersten Admin-User anlegen

## Inhalte pflegen
- Home: Titel/Lead-Text/Reservierungs-Link, 5 Bilder (mit Captions), Sektionen (Das Heim, Lage, Geschichte, Kontakt)
- Hausordnung: Text (als strukturierte Sektionen)

## Frontend-Assets
- assets/css/site.css: bewusst klein gehalten, damit du es bei Bedarf schnell anpassen kannst.
  Wenn du das aktuelle Jimdo-Design **pixelgenau** nachbauen willst, brauchst du deren CSS/Assets – die liegen nicht in diesem Paket.

## Struktur
- site/templates/default.php: Standardseite (Home)
- site/templates/hausordnung.php: Unterseite Hausordnung
- site/snippets/header.php, footer.php
- site/blueprints/pages/default.yml & hausordnung.yml
- site/blueprints/site/site.yml (Footer-Links, Kontakt/Adresse)

## Hinweis zum „identisch“
Ohne Zugriff auf das originale Jimdo-Theme (CSS, Fonts, Bildgrössen) ist „identisch“ im Sinne von **pixelgenau** nicht garantiert.
Dieses Paket bildet die Struktur & Inhalte nach und liefert ein neutrales, sehr ähnliches Layout als Ausgangspunkt.
