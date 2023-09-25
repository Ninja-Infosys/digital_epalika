                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label for="personal_detail_id" class="form-label">सिफारिस श्रेणी</label>
                                    <div class="d-flex justify-content-between gap-1">
                                        <select id="sipharis_category_id" wire:model="selectedCategory" name="sipharis_category_id" class="form-select personalDetail">
                                            <option value="">-- छान्नुहोस् --</option>
                                            @foreach ($sipharishCategories as $sipharishCategory)
                                            <option value="{{ $sipharishCategory->id }}">{{ $sipharishCategory->title }}
                                            </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    @error('sipharis_category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label for="personal_detail_id" class="form-label">सिफारिस उप-श्रेणी <span class="text-danger">*</span></label>
                                    <div class="d-flex justify-content-between gap-1">
                                        <select id="sipharis_sub_category_id" wire:model="sipharis_sub_category_id" name="sipharis_sub_category_id" class="form-select @error('sipharis_sub_category_id') is-invalid @enderror">
                                            <option value="">-- छान्नुहोस् --</option>
                                            @foreach ($sipharishSubCategories as $sipharishSubCategory)
                                            <option value="{{ $sipharishSubCategory->id }}">{{ $sipharishSubCategory->title }}
                                            </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    @error('sipharis_sub_category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="title" class="form-label">शिर्षक <span class="text-danger">*</span></label>
                                    <input type="text" name="title" wire:model="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="शिर्षक" />
                                </div>
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>