resource "google_storage_bucket" "auto-expire" {
  name          = "pigeon-cicd-bucket"
  location      = "US"
  project = "pigeons-419911"
  force_destroy = true
  public_access_prevention = "enforced"
}
#