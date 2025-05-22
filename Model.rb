class Post < ApplicationRecord
    belongs_to :user
    validade :title, presence: true
end





