provider "google" {
   credentials = "${file("./creds/serviceaccount.json")}"
   project     = "pigeons-419911" 
   region      = "US"
 }

resource "google_storage_bucket" "auto-expire" {
  name          = "pigeon-cicd-bucket"
  location      = "US"
  project = "pigeons-419911"
  force_destroy = true
  public_access_prevention = "enforced"
  
}

resource "google_storage_bucket" "auto-expire2" {
  name          = "pigeon-cicd-bucket-2"
  location      = "US"
  project = "pigeons-419911"
  force_destroy = true
  public_access_prevention = "enforced"
}
